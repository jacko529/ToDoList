<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToDoTest extends TestCase
{
    /**
     * A test for getting to do resources.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->json(GET, '/api/v1/to-do');

        $response->assertStatus(200);
    }
}
