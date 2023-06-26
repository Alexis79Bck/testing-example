<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductValidationsOnStoreTest extends TestCase
{
    /**
     * @test the descripcion field is required.
     */
    public function test_descripcion_field_is_required_on_store(): void
    {
        //Data de prueba, en este caso se utilizó 1 solo producto, pero puede realizarse con N cantidad.
        $product = [
            'descripcion' => '',
        ];

        $response = $this->post(route('products.store'), $product); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['descripcion' => 'El campo descripción es obligatorio.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion. 
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado  


    }

    /**
     * @test the descripcion field must be a string.
     */
    public function test_descripcion_field_must_be_a_string(): void
    {
        //Data de prueba, en este caso se utilizó 1 solo producto, pero puede realizarse con N cantidad.
        $product = [
            'descripcion' => 45,
        ];

        $response = $this->post(route('products.store'), $product); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['descripcion' => 'El campo descripción debe ser una cadena de caracteres.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion. 
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado  


    }

    /**
     * @test the tipo field is required.
     */
    public function test_tipo_field_is_required(): void
    {
        //Data de prueba, en este caso se utilizó 1 solo producto, pero puede realizarse con N cantidad.
        $product = [
            'tipo' => '',
        ];

        $response = $this->post(route('products.store'), $product); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['tipo' => 'El campo tipo es obligatorio.']); //Se afirma que la sesión tiene el error esperado en el campo tipo. 
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado  


    }

    /**
     * @test the tipo field must be a string.
     */
    public function test_tipo_field_must_be_a_string(): void
    {
        //Data de prueba, en este caso se utilizó 1 solo producto, pero puede realizarse con N cantidad.
        $product = [
            'tipo' => 45,
        ];

        $response = $this->post(route('products.store'), $product); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['tipo' => 'El campo tipo debe ser una cadena de caracteres.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion. 
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado  


    }

    /**
     * @test the costo field is required.
     */
    public function test_costo_field_is_required(): void
    {
        //Data de prueba, en este caso se utilizó 1 solo producto, pero puede realizarse con N cantidad.
        $product = [
            'costo' => '',
        ];

        $response = $this->post(route('products.store'), $product); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['costo' => 'El campo costo es obligatorio.']); //Se afirma que la sesión tiene el error esperado en el campo costo. 
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado  


    }

    /**
     * @test the costo field must be a number.
     */
    public function test_costo_field_must_be_a_number(): void
    {
        //Data de prueba, en este caso se utilizó 1 solo producto, pero puede realizarse con N cantidad.
        $product = [
            'costo' => 'esto es un texto',
        ];

        $response = $this->post(route('products.store'), $product); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['costo' => 'El campo costo debe ser un número.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion. 
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado  


    }

    /**
     * @test the cantidad field is required.
     */
    public function test_cantidad_field_is_required(): void
    {
        //Data de prueba, en este caso se utilizó 1 solo producto, pero puede realizarse con N cantidad.
        $product = [
            'cantidad' => '',
        ];

        $response = $this->post(route('products.store'), $product); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['cantidad' => 'El campo cantidad es obligatorio.']); //Se afirma que la sesión tiene el error esperado en el campo cantidad. 
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado  


    }

    /**
     * @test the costo field can not be a negative number.
     */
    public function test_costo_field_can_not_be_a_negative_number(): void
    {
        //Data de prueba, en este caso se utilizó 1 solo producto, pero puede realizarse con N cantidad.
        $product = [
            'costo' => -10,
        ];

        $response = $this->post(route('products.store'), $product); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['costo' => 'El campo costo no debe ser un número negativo.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion. 
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado  


    }

    /**
     * @test the cantidad field must be a number.
     */
    public function test_cantidad_field_must_be_a_number(): void
    {
        //Data de prueba, en este caso se utilizó 1 solo producto, pero puede realizarse con N cantidad.
        $product = [
            'cantidad' => 'esto es un texto',
        ];

        $response = $this->post(route('products.store'), $product); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['cantidad' => 'El campo cantidad debe ser un número.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion. 
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado  


    }

    /**
     * @test the cantidad field can not be a negative number.
     */
    public function test_cantidad_field_can_not_be_a_negative_number(): void
    {
        //Data de prueba, en este caso se utilizó 1 solo producto, pero puede realizarse con N cantidad.
        $product = [
            'cantidad' => -10,
        ];

        $response = $this->post(route('products.store'), $product); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['cantidad' => 'El campo cantidad no debe ser un número negativo.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion. 
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado  


    }
}