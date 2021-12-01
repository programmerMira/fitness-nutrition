<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\MenuCalory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MenuCaloryController
 */
class MenuCaloryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $menuCalories = MenuCalory::factory()->count(3)->create();

        $response = $this->get(route('menu-calory.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MenuCaloryController::class,
            'store',
            \App\Http\Requests\MenuCaloryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;

        $response = $this->post(route('menu-calory.store'), [
            'name' => $name,
        ]);

        $menuCalories = MenuCalory::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $menuCalories);
        $menuCalory = $menuCalories->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $menuCalory = MenuCalory::factory()->create();

        $response = $this->get(route('menu-calory.show', $menuCalory));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MenuCaloryController::class,
            'update',
            \App\Http\Requests\MenuCaloryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $menuCalory = MenuCalory::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('menu-calory.update', $menuCalory), [
            'name' => $name,
        ]);

        $menuCalory->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $menuCalory->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $menuCalory = MenuCalory::factory()->create();

        $response = $this->delete(route('menu-calory.destroy', $menuCalory));

        $response->assertNoContent();

        $this->assertDeleted($menuCalory);
    }
}
