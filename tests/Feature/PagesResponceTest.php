<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesResponceTest extends TestCase {
    public function testMainPage() {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testUploadPage() {
        $response = $this->get('/upload');

        $response->assertStatus(200);
    }
    public function testRowPage() {
        $response = $this->get('/row');

        $response->assertStatus(200);
    }
}
