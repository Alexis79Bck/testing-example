<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test the route of products index page is ok
     */
    public function test_the_route_of_products_index_page_is_ok(): void
    {
        //$response = $this->get('/web/products'); //la forma normal de indicar la URL
        $response = $this->get(route('products.index'));   //Se obtiene la respuesta HTTP de la ruta "products.index"
                                                            //la forma con helper route, es mas declarativa, para indicar la URL
        $response->assertStatus(200); //Afirma si la ruta devuelve el Estado HTTP 200

    }

    /**
     * @test the view page is web.products.index
     */
    public function test_the_view_page_is_web_products_index(): void
    {
        $response = $this->get(route('products.index')); //Se obtiene la respuesta HTTP de la ruta "products.index"
        $response->assertStatus(200); //Afirma si la ruta devuelve el Estado HTTP 200
        $response->assertViewIs('web.products.index'); //Afirma si la vista es web.products.index como respuesta

    }

    /**
     * @test the products index page has products data collection
     */
    public function test_the_products_index_page_has_products_data_collection(): void
    {
        $response = $this->get(route('products.index')); //Se obtiene la respuesta HTTP de la ruta "products.index"
        $response->assertStatus(200); //Afirma si la ruta devuelve el Estado HTTP 200
        $response->assertViewHas('products', Product::all()); //Afirma que la vista tiene una coleccion de datos como respuesta
    }

    /**
     * @test the products index page has empty data table
     */
    public function test_the_products_index_page_has_empty_data_table(): void
    {
        $response = $this->get(route('products.index')); //Se obtiene la respuesta HTTP de la ruta "products.index"
        $response->assertStatus(200); //Afirma si la ruta devuelve el Estado HTTP 200
        $response->assertSee('No se encontró ningun producto.'); //Afirma que la vista contiene el texto "No se encontró el producto."
    }

    /**
     * @test the products index page has non empty data table
     */
    public function test_the_products_index_page_has_non_empty_data_table(): void
    {
        Product::factory(1)->create(); //Se crea un producto aleatoriamente mediante el metodo Factory
        $response = $this->get(route('products.index')); //Se obtiene la respuesta HTTP de la ruta "products.index"
        $response->assertStatus(200); //Afirma si la ruta devuelve el Estado HTTP 200
        $response->assertDontSee('No se encontró ningun producto.'); //Afirma que la vista contiene el texto "No se encontró el producto."
    }

    /**
     * @test the products index page has non empty data table
     */
    public function test_can_create_a_new_product(): void
    {
        //Data de prueba, en este caso se utilizó 1 solo producto, pero puede realizarse con N cantidad.
        $product = [
            'descripcion' => 'Producto #1',
            'tipo' => 'Video',
            'costo' => 312,
            'cantidad' => 7264,
        ];

        $response = $this->post(route('products.store'), $product); //Se obtiene la respuesta POST del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertRedirect(route('products.index')); //Se afirma que el redireccionamiento sea dirigido a la ruta "products.index"

        $this->assertDatabaseCount('products', 1); //Se afirma que el conteo de registro en la base de datos es 1

        $productCreated = Product::latest()->first(); //Se obtiene el ultimo producto creado.     

        $this->assertDatabaseHas('products', $product); //Se afirma que los datos del ultimo producto se encuentre en la base de datos.

        $this->assertEquals($product['descripcion'], $productCreated->descripcion);
        $this->assertEquals($product['cantidad'], $productCreated->cantidad);

    }

}