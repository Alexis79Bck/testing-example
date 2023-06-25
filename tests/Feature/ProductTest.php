<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Reiniciar el autoincremental del ID de la tabla products
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::statement('ALTER TABLE products AUTO_INCREMENT = 1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

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
     * @test the view is web.products.index
     */
    public function test_the_view_is_web_products_index(): void
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
     * @test the create product form page is ok
     */
    public function test_the_create_product_form_page_is_ok(): void
    {
        $response = $this->get(route('products.create')); //Se obtiene la respuesta HTTP de la ruta "products.create"
        $response->assertStatus(200); //Afirma si la ruta devuelve el Estado HTTP 200
        $response->assertViewIs('web.products.create'); //Afirma si la vista es web.products.create como respuesta

        $response->assertSee('New Product'); //Afirma que la vista contiene el texto "New Product"
        $response->assertSee('Description'); //Afirma que la vista contiene el texto "Description"
        $response->assertSee('Quantity'); //Afirma que la vista contiene el texto "Quantity"
    }

    /**
     * @test the products can create a new product
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

    /**
     * @test the products can show a product
     */
    public function test_can_show_a_product(): void
    {
        //Data de prueba, en este caso se utilizó el metodo factory para crear 20 productos.
        Product::factory(20)->create();

        $product = Product::find(5); //Se busca el producto con el Id. 5

        $response = $this->get(route('products.show', [$product])); //Se obtiene la respuesta GET del HTTP

        $response->assertStatus(200); //Se afirma si la respuesta genera el codigo de estado 200 OK

        $response->assertViewIs('web.products.show'); //Afirma si la vista es web.products.show como respuesta

        $response->assertViewHas('product', $product); //Afirma que la vista tiene la coleccion de datos del producto como respuesta

        $response->assertSee(strtoupper($product->descripcion)); //Afirma que la vista contiene la descripcion del producto.

    }

    /**
     * @test the edit product form page is ok
     */
    public function test_the_edit_product_form_page_is_ok(): void
    {

        //Data de prueba, en este caso se utilizó el metodo factory para crear 20 productos.
        Product::factory(20)->create();

        $product = Product::find(11); //Se busca el producto con el Id. 11

        $response = $this->get(route('products.edit', [$product])); //Se obtiene la respuesta HTTP de la ruta "products.create"
        $response->assertStatus(200); //Afirma si la ruta devuelve el Estado HTTP 200
        $response->assertViewIs('web.products.edit'); //Afirma si la vista es web.products.create como respuesta

        $response->assertSee('Edit Product'); //Afirma que la vista contiene el texto "Edit Product"
        $response->assertSee('Description'); //Afirma que la vista contiene el texto "Description"
        $response->assertSee('Quantity'); //Afirma que la vista contiene el texto "Quantity"
    }

    /**
     * @test the products can edit a product
     */
    public function test_can_edit_a_product(): void
    {

        //Data de prueba, en este caso se utilizó el metodo factory para crear 20 productos.
        Product::factory(20)->create();

        $product = Product::find(6); //Se busca el producto con el Id. 6

        $newData = [
            'descripcion' => 'Nueva Descripcion desde Editar',
            'costo' => 256.88,
            'cantidad' => 80,
        ]; //La nueva información para actualizar sobre el producto encontrado

        $response = $this->put(route('products.update', $product), $newData); //Se obtiene la respuesta GET del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertRedirect(route('products.index')); //Se afirma que el redireccionamiento sea dirigido a la ruta "products.index"

        $this->assertDatabaseHas('products', $newData); //Se afirma que los datos del producto se encuentre en la base de datos.

        $productEdited = Product::find(6); //Se busca el producto con el Id. 6, ya editado

        $this->assertNotEquals($product->descripcion, $productEdited->descripcion); //Se afirma que el valor de descripcion original es diferente al valor del producto editado
        $this->assertNotEquals($product->cantidad, $productEdited->cantidad); //Se afirma que el valor de cantidad original es diferente al valor del producto editado

        $this->assertEquals($newData['descripcion'], $productEdited->descripcion); //Se afirma que el nuevo valor de descripcion sea igual al del producto editado.
        $this->assertEquals($newData['cantidad'], $productEdited->cantidad); //Se afirma que el nuevo valor de cantidad sea igual al del producto editado.

    }

    /**
     * @test the products can delete a product
     */
    public function test_can_delete_a_product(): void
    {

        //Data de prueba, en este caso se utilizó el metodo factory para crear 20 productos.
        Product::factory(20)->create();

        $product = Product::find(11); //Se busca el producto con el Id. 11

        $response = $this->delete(route('products.delete', $product)); //Se obtiene la respuesta GET del HTTP

        $response->assertStatus(302); //Se afirma si la respuesta genera el codigo de estado 302 para el redireccionamiento

        $response->assertRedirect(route('products.index')); //Se afirma que el redireccionamiento sea dirigido a la ruta "products.index"
        
        $response = $this->get(route('products.show', $product)); //Se obtiene la respuesta GET del HTTP
        
        $response->assertNotFound(); //Se afirma si la respuesta genera el codigo de estado 404 para la URL que no existe
        
        $this->assertDatabaseMissing('products', $product->toArray()); //Se afirma que los datos del producto se encuentre en la base de datos.

    }
}
