<?php

namespace Tests\Feature;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostProviderTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function a_provider_can_be_created(){

        $this->withOutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->post(route('provider.store'), [
            'name' => 'Alpina S.A.',
            'description' => 'Empresa de lacteos'
        ]);
        //$response->assertOk();
        $this->assertCount(1, Provider::all());

        $provider = Provider::first();
        $this->assertEquals($provider->name, 'Alpina S.A.');
        $this->assertEquals($provider->description, 'Empresa de lacteos');

        $response->assertRedirect(route('provider.index'));
    }

    /** @test */
    function list_of_providers_can_be_retrieved(){

        $this->withOutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user);

        factory(Provider::class, 3)->create();

        $response = $this->get(route('provider.index'));
        $response->assertOk();
        $providers = Provider::all();
        $response->assertViewIs('providers.index');
        $response->assertViewHas('providers', $providers);

    }

    /** @test */
    function a_providers_can_be_retrieved(){

        $this->withOutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user);

        factory(Provider::class, 1)->create();
        $provider = Provider::first();
        $response = $this->get(route('provider.show', $provider->id));
        $response->assertOk();

        $response->assertViewIs('providers.show');
        $response->assertViewHas('provider', $provider);
    }

    /** @test */
    function a_provider_can_be_updated(){

        $this->withOutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user);

        factory(Provider::class, 1)->create();

        $provider = Provider::first();
        $response = $this->put(route('provider.update', $provider->id), [
            'name' => 'Bavaria S.A.',
            'description' => 'Empresa de cervecería'
        ]);

        $this->assertCount(1, Provider::all());

        $provider = $provider->fresh();
        $this->assertEquals($provider->name, 'Bavaria S.A.');
        $this->assertEquals($provider->description, 'Empresa de cervecería');

        $response->assertRedirect(route('provider.show', $provider->id));
    }

    /** @test */
    function a_provider_can_be_deleted(){

        $this->withOutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user);

        factory(Provider::class, 1)->create();
        $provider = Provider::first();
        $response = $this->delete(route('provider.destroy', $provider->id));

        $this->assertCount(0, Provider::all());


        $response->assertRedirect(route('provider.index'));
    }
}
