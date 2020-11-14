<?php

namespace Tests\Feature;

use App\Models\Role_user;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateCustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test*/
    public function an_user_can_create_customers()
    {
        //para ejecutar las pruebas utilizamos vendor/bin/phpunit o php artisan test
        // 1. Given => Teniendo - contexto
        $user = factory(User::class)->create();

        $this->actingAs($user);
        // 2. When => Cuando - acciona probar
        $this->post(route('cliente.store'), [
            'name' => 'Moses Bradtke',
            'email' => 'example@mail.com',
            'address' => 'calle 112',
            'gender' => 'Masculino',
            'bith_date' => '1994-11-10'
        ]);
        // 3. Then => Etonces - comprobamos que resultados sean los esperados
        $this->assertDatabaseHas('customers', [
            'name' => 'Moses Bradtke',
            'email' => 'example@mail.com',
            'address' => 'calle 112',
            'gender' => 'Masculino',
            'bith_date' => '1994-11-10'
        ]);
    }
}
