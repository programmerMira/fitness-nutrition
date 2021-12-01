<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\LifeStyle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LifeStyleController
 */
class LifeStyleControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $lifeStyles = LifeStyle::factory()->count(3)->create();

        $response = $this->get(route('life-style.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LifeStyleController::class,
            'store',
            \App\Http\Requests\LifeStyleStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;

        $response = $this->post(route('life-style.store'), [
            'name' => $name,
        ]);

        $lifeStyles = LifeStyle::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $lifeStyles);
        $lifeStyle = $lifeStyles->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $lifeStyle = LifeStyle::factory()->create();

        $response = $this->get(route('life-style.show', $lifeStyle));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LifeStyleController::class,
            'update',
            \App\Http\Requests\LifeStyleUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $lifeStyle = LifeStyle::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('life-style.update', $lifeStyle), [
            'name' => $name,
        ]);

        $lifeStyle->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $lifeStyle->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $lifeStyle = LifeStyle::factory()->create();

        $response = $this->delete(route('life-style.destroy', $lifeStyle));

        $response->assertNoContent();

        $this->assertDeleted($lifeStyle);
    }
}
