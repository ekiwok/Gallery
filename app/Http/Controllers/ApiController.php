<?php

namespace App\Http\Controllers;

use Gallery\Command\AddImageCommand;
use Gallery\Command\CreateAlbumCommand;
use Gallery\Command\RemoveAlbumCommand;
use Gallery\Model\Url;
use Gallery\Model\UUID;
use Gallery\Query\AlbumQuery;
use Gallery\Query\ImageQuery;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\Response;
use Ramsey\Uuid\UuidFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    /**
     * @var UuidFactoryInterface
     */
    private $uuidFactory;

    /**
     * @var Dispatcher
     */
    private $bus;

    /**
     * @var AlbumQuery
     */
    private $albums;

    /**
     * @param UuidFactoryInterface $uuidFactory
     * @param Dispatcher $bus
     * @param AlbumQuery $albums
     */
    public function __construct(UuidFactoryInterface $uuidFactory, Dispatcher $bus, AlbumQuery $albums)
    {
        $this->uuidFactory = $uuidFactory;
        $this->bus = $bus;
        $this->albums = $albums;
    }

    public function postAlbum(Request $request)
    {
        $uuid = $this->createUuid();

        $command = new CreateAlbumCommand($uuid, $request->get('name'));

        $this->bus->dispatch($command);

        return new Response('', Response::HTTP_CREATED, [
            'Location' => '/api/albums/' . (string) $uuid
        ]);
    }

    public function addImage(Request $request, $uuid)
    {
        $album = $this->albums->findOneByUuid(new UUID($uuid));

        if (!$album) {
            abort(404);
        }

        $command = new AddImageCommand(
            $this->createUuid(),
            new Url($request->get('url')),
            $album
        );

        $this->bus->dispatch($command);

        return new Response('', Response::HTTP_CREATED);
    }

    public function removeAlbum($uuid)
    {
        $album = $this->albums->findOneByUuid(new UUID($uuid));

        if (!$album) {
            abort(404);
        }

        $command = new RemoveAlbumCommand($album);

        $this->bus->dispatch($command);

        return new Response('', Response::HTTP_NO_CONTENT);
    }

    /**
     * @return UUID
     */
    private function createUuid()
    {
        return new UUID( (string) $this->uuidFactory->uuid4());
    }
}
