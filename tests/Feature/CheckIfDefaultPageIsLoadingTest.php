<?php

namespace Tests\Feature;


use Tests\TestCase;

class CheckIfDefaultPageIsLoadingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertViewIs('welcome');
        $response->assertStatus(200);
    }
}
