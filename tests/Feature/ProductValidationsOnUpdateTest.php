<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;

class ProductValidationsOnUpdateTest extends TestCase
{
    /**
     * @test the descripcion field is required.
     */
    public function test_descripcion_field_is_required(): void
    {
        Product::factory(1)->create();

        $product = Product::find(1); //Se busca el producto con el Id. 1

        $data = [
            'descripcion' => '',
        ];

        $response = $this->put(route('products.update', $product->id), $data); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['descripcion' => 'El campo descripción es obligatorio.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion.
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado

    }

    /**
     * @test the descripcion field must be a string.
     */
    public function test_descripcion_field_must_be_a_string(): void
    {
        Product::factory(1)->create();

        $product = Product::find(1); //Se busca el producto con el Id. 1

        $data = [
            'descripcion' => 45,
        ];

        $response = $this->put(route('products.update', $product->id), $data); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['descripcion' => 'El campo descripción debe ser una cadena de caracteres.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion.
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado

    }

    /**
     * @test the tipo field is required.
     */
    public function test_tipo_field_is_required(): void
    {
        Product::factory(1)->create();

        $product = Product::find(1); //Se busca el producto con el Id. 1

        $data = [
            'tipo' => '',
        ];

        $response = $this->put(route('products.update', $product->id), $data); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['tipo' => 'El campo tipo es obligatorio.']); //Se afirma que la sesión tiene el error esperado en el campo tipo.
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado

    }

    /**
     * @test the tipo field must be a string.
     */
    public function test_tipo_field_must_be_a_string(): void
    {
        Product::factory(1)->create();

        $product = Product::find(1); //Se busca el producto con el Id. 1

        $data = [
            'tipo' => 45,
        ];

        $response = $this->put(route('products.update', $product->id), $data); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['tipo' => 'El campo tipo debe ser una cadena de caracteres.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion.
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado

    }

    /**
     * @test the costo field is required.
     */
    public function test_costo_field_is_required(): void
    {
        Product::factory(1)->create();

        $product = Product::find(1); //Se busca el producto con el Id. 1

        $data = [
            'costo' => '',
        ];

        $response = $this->put(route('products.update', $product->id), $data); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['costo' => 'El campo costo es obligatorio.']); //Se afirma que la sesión tiene el error esperado en el campo costo.
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado

    }

    /**
     * @test the costo field must be a number.
     */
    public function test_costo_field_must_be_a_number(): void
    {
        Product::factory(1)->create();

        $product = Product::find(1); //Se busca el producto con el Id. 1

        $data = [
            'costo' => 'esto es un texto',
        ];

        $response = $this->put(route('products.update', $product->id), $data); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['costo' => 'El campo costo debe ser un número.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion.
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado

    }

    /**
     * @test the cantidad field is required.
     */
    public function test_cantidad_field_is_required(): void
    {
        Product::factory(1)->create();

        $product = Product::find(1); //Se busca el producto con el Id. 1

        $data = [
            'cantidad' => '',
        ];

        $response = $this->put(route('products.update', $product->id), $data); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['cantidad' => 'El campo cantidad es obligatorio.']); //Se afirma que la sesión tiene el error esperado en el campo cantidad.
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado

    }

    /**
     * @test the costo field can not be a negative number.
     */
    public function test_costo_field_can_not_be_a_negative_number(): void
    {
        Product::factory(1)->create();

        $product = Product::find(1); //Se busca el producto con el Id. 1

        $data = [
            'costo' => -12,
        ];

        $response = $this->put(route('products.update', $product->id), $data); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['costo' => 'El campo costo no debe ser un número negativo.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion.
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado

    }

    /**
     * @test the cantidad field must be a number.
     */
    public function test_cantidad_field_must_be_a_number(): void
    {
        Product::factory(1)->create();

        $product = Product::find(1); //Se busca el producto con el Id. 1

        $data = [
            'cantidad' => 'esto es un texto',
        ];

        $response = $this->put(route('products.update', $product->id), $data); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['cantidad' => 'El campo cantidad debe ser un número.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion.
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado

    }

    /**
     * @test the cantidad field can not be a negative number.
     */
    public function test_cantidad_field_can_not_be_a_negative_number(): void
    {
        Product::factory(1)->create();

        $product = Product::find(1); //Se busca el producto con el Id. 1

        $data = [
            'cantidad' => -12,
        ];

        $response = $this->put(route('products.update', $product->id), $data); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertSessionHasErrors(['cantidad' => 'El campo cantidad no debe ser un número negativo.']); //Se afirma que la sesión tiene el error esperado en el campo descripcion.
        //Opcionalmente se puede comprobar que el error esperado contenga el mensaje personalizado

    }
}
