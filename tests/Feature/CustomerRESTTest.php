<?php

namespace Tests\Feature;


use App\Models\Customer;
use App\Models\User;
use Tests\TestCase;

class CustomerRESTTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $response =  $this->actingAs($user)->get('/api/customer/');

        $response->assertStatus(200);
    }

    public function testCreate(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $response =  $this->actingAs($user)->get('/api/customer/create');

        $response->assertStatus(200);
    }

    public function testShow(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $customer = Customer::factory()->create();
        $response = $this->actingAs($user)->get('/api/customer/' . $customer->id);
        $response->assertStatus(200);
    }

    public function testStore(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $customer = Customer::factory()->create()->toArray();
        $response = $this->actingAs($user)->post('/api/customer/', $customer);
        $response->assertStatus(201);
    }

    public function testUpdate(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $customer = Customer::factory()->create();
        $customerUpdatedData = Customer::factory()->create()->toArray();
        $response =  $this->actingAs($user)->put('/api/customer/' . $customer->id, $customerUpdatedData);
        $response->assertStatus(200);
    }

    public function testDelete(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $customer = Customer::factory()->create();
        $response =  $this->actingAs($user)->delete('/api/customer/' . $customer->id);
        $response->assertStatus(204);
    }
}
