<?php

namespace App\Http\Controllers;

use Gallery\Query\AlbumQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GalleryController extends BaseController
{
    /**
     * @var AlbumQuery
     */
    private $albums;

    /**
     * @param AlbumQuery $albums
     */
    public function __construct(AlbumQuery $albums)
    {
        $this->albums = $albums;
    }

    public function showAlbums()
    {
        $albums = $this->albums->findAllAlbums();

        return view('albums', compact('albums'));
    }
}
