<?php

namespace App\Http\Controllers;

use Gallery\Command\CreateAlbumCommand;
use Gallery\Model\UUID;
use Gallery\Query\AlbumQuery;
use Gallery\Query\ImageQuery;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\Response;
use Ramsey\Uuid\UuidFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class ApiController
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
     * @param UuidFactoryInterface $uuidFactory
     * @param Dispatcher $bus
     */
    public function __construct(UuidFactoryInterface $uuidFactory, Dispatcher $bus)
    {
        $this->uuidFactory = $uuidFactory;
        $this->bus = $bus;
    }

    public function postAlbum(Request $request)
    {
        $uuid = $this->createUuid();

        $command = new CreateAlbumCommand($uuid, $request->get('name'));

        $this->bus->dispatch($command);

        return new Response('', 201, [
            'Location' => '/album/' . (string) $uuid
        ]);
    }

    /**
     * @return UUID
     */
    private function createUuid()
    {
        return new UUID( (string) $this->uuidFactory->uuid4());
    }
}
