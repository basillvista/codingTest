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
        $user = User::factory()->create();
        $user->attachUserRoleForUser();
        $admin = User::factory()->create();
        $admin->attachAdminRoleForUser();

        $customer = Customer::factory()->create(['user_id'=>$user->id]);
        $customerAdmin = Customer::factory()->create(['user_id' => $admin->id]);

        $response = $this->actingAs($admin)->get('/api/customers');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/api/customers');
        $response->assertStatus(403);

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
            $user = User::factory()->create();
            $user->attachUserRoleForUser();
            $admin = User::factory()->create();
            $admin->attachAdminRoleForUser();

            $customer = Customer::factory()->create(['user_id'=>$user->id]);
            $customerAdmin = Customer::factory()->create(['user_id' => $admin->id]);

            $response = $this->actingAs($admin)->get('/api/customers/' . $customerAdmin->id);
            $response->assertStatus(200);

            $response = $this->actingAs($user)->get('/api/customers/' . $customer->id);
            $response->assertStatus(403);

    }
//
    public function testStore(){
        $user = User::factory()->create();
        $user->attachUserRoleForUser();
        $admin = User::factory()->create();
        $admin->attachAdminRoleForUser();

        $customerAdmin = Customer::factory()->create(['user_id'=>$admin->id])->toArray();
        $customer = Customer::factory()->create(['user_id' => $user->id])->toArray();

        $response = $this->actingAs($user)->post('/api/customers/', $customer);
        $response->assertStatus(201);

        $response = $this->actingAs($admin)->post('/api/customers/', $customerAdmin);
        $response->assertStatus(201);
    }

//
    public function testUpdate(){
        $user = User::factory()->create();
        $user->attachUserRoleForUser();
        $admin = User::factory()->create();
        $admin->attachAdminRoleForUser();

        $customer = Customer::factory()->create(['user_id' => $user->id]);
        $customerUpdatedData = Customer::factory()->create(['user_id' => $admin->id])->toArray();
        $customerAdmin = Customer::factory()->create(['user_id'=>$admin->id]);
        $customerAdminUpdatedData = Customer::factory()->create(['user_id' => $admin->id])->toArray();

        $response =  $this->actingAs($admin)->put('/api/customers/' . $customerAdmin->id, $customerAdminUpdatedData);
        $response->assertStatus(200);

        $response = $this->actingAs($user)->put('/api/customers/' . $customer->id, $customerUpdatedData);
        $response->assertStatus(403);
    }

    public function testDelete(){
        $user = User::factory()->create();
        $user->attachUserRoleForUser();
        $admin = User::factory()->create();
        $admin->attachAdminRoleForUser();

        $customer = Customer::factory()->create(['user_id' => $user->id]);
        $customerAdmin = Customer::factory()->create(['user_id'=>$admin->id]);

        $response =  $this->actingAs($admin)->delete('/api/customers/' . $customerAdmin->id);
        $response->assertStatus(204);

        $response = $this->actingAs($user)->delete('/api/customers/' . $customer->id);
        $response->assertStatus(403);
    }
}
