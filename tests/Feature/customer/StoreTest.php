<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCustomerStore()
    {
      $response = $this->withHeaders([
        'X-CSRF-TOKEN' => '123123',
      ])->post('/customers', ['name' => 'Teste']);

      $response->assertStatus(302);
    }
}
