<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UrlTest extends TestCase
{
    public function test_all_urls_without_auth_returns_successful_response(): void
    {
        $this->get('/')->assertRedirect('most-conversion'); //Redirect
        $this->get('/most-conversion')->assertOk();
        $this->get('/user-transaction-info')->assertOk();
        $this->get('/transaction-history')->assertOk();
    }
}
