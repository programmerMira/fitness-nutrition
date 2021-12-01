<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\MenuType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MenuTypeController
 */
class MenuTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $menuTypes = MenuType::factory()->count(3)->create();

        $response = $this->get(route('menu-type.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MenuTypeController::class,
            'store',
            \App\Http\Requests\MenuTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;

        $response = $this->post(route('menu-type.store'), [
            'name' => $name,
        ]);

        $menuTypes = MenuType::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $menuTypes);
        $menuType = $menuTypes->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $menuType = MenuType::factory()->create();

        $response = $this->get(route('menu-type.show', $menuType));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MenuTypeController::class,
            'update',
            \App\Http\Requests\MenuTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $menuType = MenuType::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('menu-type.update', $menuType), [
            'name' => $name,
        ]);

        $menuType->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $menuType->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $menuType = MenuType::factory()->create();

        $response = $this->delete(route('menu-type.destroy', $menuType));

        $response->assertNoContent();

        $this->assertDeleted($menuType);
    }
}
