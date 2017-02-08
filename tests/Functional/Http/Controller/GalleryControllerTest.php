<?php

class GalleryControllerTest extends TestCase
{
    public function testShowAlbums()
    {
        $this->visit('/')
             ->see('Dogs')
             ->see('Cats')
             ->see('Landscapes')
             ->see('Empty');
    }
}
