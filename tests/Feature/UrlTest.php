<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UrlTest extends TestCase
{
    public function test_all_urls_without_auth_returns_successful_response(): void
    {
        $this->get('/')->assertStatus(302); //Redirect
        $this->get('/most-conversion')->assertStatus(200);
        $this->get('/user-transaction-info')->assertStatus(200);
        $this->get('/transaction-history')->assertStatus(200);
    }
}
