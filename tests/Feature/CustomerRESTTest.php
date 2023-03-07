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
//     */
    public function testIndex(){
        $admin = User::factory()->create();
        $admin->attachRoleForUser();

        $customer = Customer::factory()->create(['user_id' => $admin->id]);

        $response = $this->actingAs($admin)->get('/api/customers');
        $response->assertStatus(200);

    }

//    public function testCreate(){
//        $user = User::factory()->create();
//        $this->actingAs($user);
//        $response =  $this->actingAs($user)->get('/api/customer/create');
//
//        $response->assertStatus(200);
//    }
//
    public function testShow(){

            $admin = User::factory()->create();
            $admin->attachRoleForUser();

            $customer = Customer::factory()->create(['user_id' => $admin->id]);

            $response = $this->actingAs($admin)->get('/api/customers/' . $customer->id);
            $response->assertStatus(200);

    }
//
    public function testStore(){
        $admin = User::factory()->create();
        $admin->attachRoleForUser();

        $customer = Customer::factory()->create(['user_id' => $admin->id])->toArray();
        $response = $this->actingAs($admin)->post('/api/customers/', $customer);
        $response->assertStatus(201);
    }
//
//    public function testUpdate(){
//        $user = User::factory()->create();
//        $this->actingAs($user);
//        $customer = Customer::factory()->create();
//        $customerUpdatedData = Customer::factory()->create()->toArray();
//        $response =  $this->actingAs($user)->put('/api/customer/' . $customer->id, $customerUpdatedData);
//        $response->assertStatus(200);
//    }
//
//    public function testDelete(){
//        $user = User::factory()->create();
//        $this->actingAs($user);
//        $customer = Customer::factory()->create();
//        $response =  $this->actingAs($user)->delete('/api/customer/' . $customer->id);
//        $response->assertStatus(204);
//    }    public function testCreate(){
//        $user = User::factory()->create();
//        $this->actingAs($user);
//        $response =  $this->actingAs($user)->get('/api/customer/create');
//
//        $response->assertStatus(200);
//    }
//
//    public function testShow(){
//        $user = User::factory()->create();
//        $this->actingAs($user);
//        $customer = Customer::factory()->create();
//        $response = $this->actingAs($user)->get('/api/customer/' . $customer->id);
//        $response->assertStatus(200);
//    }
//
//    public function testStore(){
//        $user = User::factory()->create();
//        $this->actingAs($user);
//        $customer = Customer::factory()->create()->toArray();
//        $response = $this->actingAs($user)->post('/api/customer/', $customer);
//        $response->assertStatus(201);
//    }
//
    public function testUpdate(){
        $admin = User::factory()->create();
        $admin->attachRoleForUser();

        $customer = Customer::factory()->create(['user_id' => $admin->id])->toArray();
        $customerUpdatedData = Customer::factory()->create()->toArray();
        $response =  $this->actingAs($admin)->put('/api/customer/' . $customer->id, $customerUpdatedData);
        $response->assertStatus(200);
    }
//
//    public function testDelete(){
//        $user = User::factory()->create();
//        $this->actingAs($user);
//        $customer = Customer::factory()->create();
//        $response =  $this->actingAs($user)->delete('/api/customer/' . $customer->id);
//        $response->assertStatus(204);
//    }
}
