<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\FoodCalendar;
use App\Models\UsersMenus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FoodCalendarController
 */
class FoodCalendarControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $foodCalendars = FoodCalendar::factory()->count(3)->create();

        $response = $this->get(route('food-calendar.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FoodCalendarController::class,
            'store',
            \App\Http\Requests\FoodCalendarStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $users_menus = UsersMenus::factory()->create();
        $menu_number = $this->faker->numberBetween(-10000, 10000);
        $day = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('food-calendar.store'), [
            'users_menus_id' => $users_menus->id,
            'menu_number' => $menu_number,
            'day' => $day,
        ]);

        $foodCalendars = FoodCalendar::query()
            ->where('users_menus_id', $users_menus->id)
            ->where('menu_number', $menu_number)
            ->where('day', $day)
            ->get();
        $this->assertCount(1, $foodCalendars);
        $foodCalendar = $foodCalendars->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $foodCalendar = FoodCalendar::factory()->create();

        $response = $this->get(route('food-calendar.show', $foodCalendar));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FoodCalendarController::class,
            'update',
            \App\Http\Requests\FoodCalendarUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $foodCalendar = FoodCalendar::factory()->create();
        $users_menus = UsersMenus::factory()->create();
        $menu_number = $this->faker->numberBetween(-10000, 10000);
        $day = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('food-calendar.update', $foodCalendar), [
            'users_menus_id' => $users_menus->id,
            'menu_number' => $menu_number,
            'day' => $day,
        ]);

        $foodCalendar->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($users_menus->id, $foodCalendar->users_menus_id);
        $this->assertEquals($menu_number, $foodCalendar->menu_number);
        $this->assertEquals($day, $foodCalendar->day);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $foodCalendar = FoodCalendar::factory()->create();

        $response = $this->delete(route('food-calendar.destroy', $foodCalendar));

        $response->assertNoContent();

        $this->assertDeleted($foodCalendar);
    }
}
