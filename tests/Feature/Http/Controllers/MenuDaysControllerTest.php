<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuDay;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MenuDaysController
 */
class MenuDaysControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $menuDays = MenuDays::factory()->count(3)->create();

        $response = $this->get(route('menu-day.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MenuDaysController::class,
            'store',
            \App\Http\Requests\MenuDaysStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $menu = Menu::factory()->create();
        $day_number = $this->faker->numberBetween(-10000, 10000);
        $name = $this->faker->name;
        $description = $this->faker->text;
        $content = $this->faker->paragraphs(3, true);

        $response = $this->post(route('menu-day.store'), [
            'menu_id' => $menu->id,
            'day_number' => $day_number,
            'name' => $name,
            'description' => $description,
            'content' => $content,
        ]);

        $menuDays = MenuDay::query()
            ->where('menu_id', $menu->id)
            ->where('day_number', $day_number)
            ->where('name', $name)
            ->where('description', $description)
            ->where('content', $content)
            ->get();
        $this->assertCount(1, $menuDays);
        $menuDay = $menuDays->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $menuDay = MenuDays::factory()->create();

        $response = $this->get(route('menu-day.show', $menuDay));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MenuDaysController::class,
            'update',
            \App\Http\Requests\MenuDaysUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $menuDay = MenuDays::factory()->create();
        $menu = Menu::factory()->create();
        $day_number = $this->faker->numberBetween(-10000, 10000);
        $name = $this->faker->name;
        $description = $this->faker->text;
        $content = $this->faker->paragraphs(3, true);

        $response = $this->put(route('menu-day.update', $menuDay), [
            'menu_id' => $menu->id,
            'day_number' => $day_number,
            'name' => $name,
            'description' => $description,
            'content' => $content,
        ]);

        $menuDay->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($menu->id, $menuDay->menu_id);
        $this->assertEquals($day_number, $menuDay->day_number);
        $this->assertEquals($name, $menuDay->name);
        $this->assertEquals($description, $menuDay->description);
        $this->assertEquals($content, $menuDay->content);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $menuDay = MenuDays::factory()->create();
        $menuDay = MenuDay::factory()->create();

        $response = $this->delete(route('menu-day.destroy', $menuDay));

        $response->assertNoContent();

        $this->assertDeleted($menuDay);
    }
}
