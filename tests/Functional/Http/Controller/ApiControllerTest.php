<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiControllerTest extends TestCase
{
    public function testPostAlbum()
    {
        $this->post('/api/albums', ['name' => 'New Album'])
            ->assertResponseStatus(201);

        return $this->response->headers->get('Location');
    }

    /**
     * @depends testPostAlbum
     */
    public function testAddImage($albumLocation)
    {
        $this->post($albumLocation, ['url' => 'http://example.com/test.png'])
            ->assertResponseStatus(201);

        return $albumLocation;
    }

    /**
     * @depends testAddImage
     */
    public function testRemoveAlbum($albumLocation)
    {
        $this->delete($albumLocation)
            ->assertResponseStatus(204);
    }
}
