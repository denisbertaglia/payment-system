<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    private string $urlBase = "/api/v1";
    private array $headers = [
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
    ];

    /**
     * A basic feature test example.
     */
    public function test_transaction_already(): void
    {
        $response = $this->post($this->urlBase . '/transaction', [], $this->headers);

        $response->assertStatus(422);
    }
}
