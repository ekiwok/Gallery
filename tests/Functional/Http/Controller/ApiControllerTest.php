<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiControllerTest extends TestCase
{
    public function testShowAlbums()
    {
        $this->post('/api/albums', ['name' => 'New Album'])
            ->assertResponseStatus(201)
        ;
    }
}
