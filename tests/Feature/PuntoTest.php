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
    use RefreshDatabase;  //Para poder crear 

/*
    public function testMasterPuntoNuevo2()
    {
        $data = [
            'ciudad' => '1',
            'nombre' => 'Prueba',
            'descripcion' => 'Prueba',
            'leyenda' => 'Prueba',
            'referencia' => 'Prueba',
            'telefono' => '926',
            'web' => 'Prueba',
            'longitud' => '36',
            'latitud' => '36',
            'coste' => '1',
            'horario' => '1',
            'tipo' => '1',
            'puntos' => '8',
            'siglo' => '14',
            'etiquetas' => 'Prueba',
            'curiosidades' => 'Prueba',
        ];
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('masterPuntoNuevo2', $data));
        $response ->assertStatus(200);  //Comprueba rerspuesta del servidor

    }
*/
    public function testGetPuntosxEstado()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('getPuntosxEstado'));
        $response ->assertStatus(200);  //Comprueba rerspuesta del servidor
    }

    public function testViewMasterPuntoModificar1()
    {
        $data = ['id'=>1,
            [
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
        ]
       ];

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('masterPuntoModificar1'), $data);
        $response ->assertStatus(200);
    }
    public function testViewMaster()
    {
        $data = [
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
            'provincia'     => [
                'id'        =>1,
                'estado_id' =>1,
                'nombre'    =>'Nombre de la provincia',
                'longitud'      => 26,
                'latitud'       => 26,
            ],
        ];

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('master'), $data);
        $response ->assertStatus(200);
    }

}
