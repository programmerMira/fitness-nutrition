<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCalories;
use App\Models\MenuType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MenuController
 */
class MenuControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $menus = Menu::factory()->count(3)->create();

        $response = $this->get(route('menu.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MenuController::class,
            'store',
            \App\Http\Requests\MenuStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $menu_type = MenuType::factory()->create();
        $menu_calories = MenuCalories::factory()->create();
        $menu_content = $this->faker->;

        $response = $this->post(route('menu.store'), [
            'menu_type_id' => $menu_type->id,
            'menu_calories_id' => $menu_calories->id,
            'menu_content' => $menu_content,
        ]);

        $menus = Menu::query()
            ->where('menu_type_id', $menu_type->id)
            ->where('menu_calories_id', $menu_calories->id)
            ->where('menu_content', $menu_content)
            ->get();
        $this->assertCount(1, $menus);
        $menu = $menus->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $menu = Menu::factory()->create();

        $response = $this->get(route('menu.show', $menu));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MenuController::class,
            'update',
            \App\Http\Requests\MenuUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $menu = Menu::factory()->create();
        $menu_type = MenuType::factory()->create();
        $menu_calories = MenuCalories::factory()->create();
        $menu_content = $this->faker->;

        $response = $this->put(route('menu.update', $menu), [
            'menu_type_id' => $menu_type->id,
            'menu_calories_id' => $menu_calories->id,
            'menu_content' => $menu_content,
        ]);

        $menu->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($menu_type->id, $menu->menu_type_id);
        $this->assertEquals($menu_calories->id, $menu->menu_calories_id);
        $this->assertEquals($menu_content, $menu->menu_content);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $menu = Menu::factory()->create();

        $response = $this->delete(route('menu.destroy', $menu));

        $response->assertNoContent();

        $this->assertDeleted($menu);
    }
}
