<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiUserControllerTest extends TestCase
{
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
