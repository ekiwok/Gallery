<?php

class AlbumControllerTest extends TestCase
{
    public function testShowAlbumImages()
    {
        $this->visit('/album/237bdd9c-4dad-4c51-9b7b-257b0786e6ec/')
             ->assertResponseStatus(200);
    }
}
