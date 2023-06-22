<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @test the application returns a successful response
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test can see the documentation word in hompage
     */
    public function test_can_see_the_documentation_word_in_hompage(): void
    {
        $response = $this->get('/');

        $response->assertSee('Documentation');
        $response->assertStatus(200);
    }
}
