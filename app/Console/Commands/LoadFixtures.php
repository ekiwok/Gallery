<?php

namespace App\Console\Commands;

use Ekiwok\QuickFixtures\ContextInterface;
use Ekiwok\QuickFixtures\GeneratorInterface;
use Ekiwok\QuickFixtures\Processor\PrioritisedProcessorInterface;
use Gallery\Entity\Album;
use Gallery\Entity\Image;
use Gallery\Repository\AlbumRepositoryInterface;
use Gallery\Repository\ImageRepositoryInterface;
use Illuminate\Console\Command;
use Symfony\Component\Yaml\Yaml;
use Ekiwok\QuickFixtures\Factory\GeneratorFactory;

class LoadFixtures extends Command implements PrioritisedProcessorInterface
{
    /**
     * {@inheritdoc}
     */
    protected $signature = 'app:load:fixtures';

    /**
     * {@inheritdoc}
     */
    protected $description = 'Loads demo fixtures';

    /**
     * @var AlbumRepositoryInterface
     */
    private $albums;

    /**
     * @var ImageRepositoryInterface
     */
    private $images;

    /**
     * {@inheritdoc}
     */
    public function __construct(AlbumRepositoryInterface $albums, ImageRepositoryInterface $images)
    {
        parent::__construct();

        $this->albums = $albums;
        $this->images = $images;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $generator = (new GeneratorFactory())->create();
        $generator->addProcessor($this);

        // load albums
        $albums = [];
        $data = Yaml::parse(file_get_contents(config_path('fixtures').'/albums.yml'));
        $albumsDefinitions = $data['albums'];
        foreach ($albumsDefinitions as $albumDefinition) {
            /** @var Album $album */
            $album = $generator->generate(Album::class, $albumDefinition);
            $albums[$album->getName()] = $album;

            $this->albums->add($album);
        }

        // load images
        $data = Yaml::parse(file_get_contents(config_path('fixtures').'/images.yml'));
        $imagesDefinitions = $data['images'];
        foreach ($imagesDefinitions as $imageDefinition) {
            $imageDefinition['album'] = $albums[$imageDefinition['album']];
            $image = $generator->generate(Image::class, $imageDefinition);
            $this->images->add($image);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContextInterface $context, $payload, GeneratorInterface $generator)
    {
        return $payload;
    }

    /**
     * {@inheritdoc}
     */
    public function applies(ContextInterface $context, $payload)
    {
        return is_object($payload) && $payload instanceof Album;
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        return 1024;
    }
}
