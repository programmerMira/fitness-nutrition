<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\UserMenu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UserMenuController
 */
class UserMenuControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $userMenus = UserMenu::factory()->count(3)->create();

        $response = $this->get(route('user-menu.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UserMenuController::class,
            'store',
            \App\Http\Requests\UserMenuStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $user = User::factory()->create();
        $menu = Menu::factory()->create();

        $response = $this->post(route('user-menu.store'), [
            'user_id' => $user->id,
            'menu_id' => $menu->id,
        ]);

        $userMenus = UserMenu::query()
            ->where('user_id', $user->id)
            ->where('menu_id', $menu->id)
            ->get();
        $this->assertCount(1, $userMenus);
        $userMenu = $userMenus->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $userMenu = UserMenu::factory()->create();

        $response = $this->get(route('user-menu.show', $userMenu));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UserMenuController::class,
            'update',
            \App\Http\Requests\UserMenuUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $userMenu = UserMenu::factory()->create();
        $user = User::factory()->create();
        $menu = Menu::factory()->create();

        $response = $this->put(route('user-menu.update', $userMenu), [
            'user_id' => $user->id,
            'menu_id' => $menu->id,
        ]);

        $userMenu->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($user->id, $userMenu->user_id);
        $this->assertEquals($menu->id, $userMenu->menu_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $userMenu = UserMenu::factory()->create();

        $response = $this->delete(route('user-menu.destroy', $userMenu));

        $response->assertNoContent();

        $this->assertDeleted($userMenu);
    }
}
