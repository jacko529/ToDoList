<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\toDoList;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToDoTest extends TestCase
{
    public function testBasicsTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_creating_a_store_of_to_do_list()
    {

    }

    /**
     * @test
     */
    public function test_deleting_resource()
    {

    }

    /**
     * @test
     */
    public function test_updating_a_resource()
    {

    }

    /**
     * @test
     */
    public function test_displaying_all_resources()
    {

    }



    /**
     * @test
     */
    public function test_validation_of_the_create_resource()
    {

    }


    /**
     * @test
     */
    public function test_validation_of_the_update_resource()
    {

    }
}
