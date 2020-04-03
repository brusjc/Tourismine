<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Punto;

class PuntoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase, WithFaker;  //Para poder crear 

/*
    public function testGetPuntosxEstado()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('getPuntosxEstado'));
        $response ->assertStatus(200);  //Comprueba rerspuesta del servidor
    }


    public function testViewMaster()
    {
        $provincia = [
                'id'        =>1,
                'estado_id' =>1,
                'nombre'    =>'Nombre de la provincia',
                'longitud'  => 26,
                'latitud'   => 26,
            ];
        $data = [
            'id'            => 1,
            'ciudad_id'     => 1,
            'nombre'        => 'nombre',
            'descripcion'   => 'descripcion',
            'leyenda'       => 'leyenda',
            'referencia'    => 'referencia',
            'telefono'      => '629',
            'web'           => 'web',
            'longitud'      => '36',
            'latitud'       => '36',
            'coste'         => '1',
            'horario_id'    => '1',
            'tipo_id'       => '1',
            'puntos'        => '8',
            'siglo'         => 'siglo',
            'etiquetas'     => 'etiqueta',
            'curiosidades'  => 'curiosidades',
            'ciudad'        => [
                                    'id'        =>1,
                                    'nombre'    =>'Nombre de la ciudad',
                                    'provincia_id'  => 629,
                                ],
        ];
        $id=1;
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('master', $id));
        $response ->assertStatus(200);
    }
*/
    public function testGetPuntos()
    {
            $response = $this->get('/');
            $response->assertStatus(200);
    }

    public function testGetPunto()
    {
            $response = $this->get('/');
            $response->assertStatus(200);
    }

    public function testGetPuntosxProvincia()
    {
            $response = $this->get('/');
            $response->assertStatus(200);
    }


    //***************
    //* Formularios *
    //***************

    public function testCreate()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('masterPuntoNuevo1'));
        $response ->assertStatus(200);
    }

    public function testEdit()
    {
        $id = 1;
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('masterPuntoModificar1', $id));
        $response ->assertStatus(200);
    }


    //*****************************
    //* Respuesta API formularios *
    //*****************************

    public function testStore()
    {
            $response = $this->get('/');
            $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $data = [
            'id'            => 1,
            'ciudad_id'     => 1,
            'nombre'        => 'nombre',
            'descripcion'   => 'descripcion',
            'leyenda'       => 'leyenda',
            'referencia'    => 'referencia',
            'telefono'      => 629,
            'web'           => 'web',
            'longitud'      => 36,
            'latitud'       => 36,
            'coste'         => 1,
            'horario_id'    => 1,
            'tipo_id'       => 1,
            'puntos'        => 8,
            'siglo'         => 'siglo',
            'etiquetas'     => 'etiqueta',
            'curiosidades'  => 'curiosidades',
        ];
        $id=1;

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post(route('masterPuntoModificar2', $id));
        $response ->assertStatus(200);
    }

    public function testDestroy()
    {
        $id=1;
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('masterPuntoBorrar2', $id));
        $response ->assertStatus(200);
    }


}
