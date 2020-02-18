<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Ciudad;

class CiudadTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    use RefreshDatabase;  //Para poder crear 

    public function testGetCiudades()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('getCiudades'));
        $response ->assertStatus(200);  //Comprueba rerspuesta del servidor
    }
}
