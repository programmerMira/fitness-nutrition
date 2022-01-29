<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\AccessHistory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AccessHistoryController
 */
class AccessHistoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $accessHistories = AccessHistory::factory()->count(3)->create();

        $response = $this->get(route('access-history.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AccessHistoryController::class,
            'store',
            \App\Http\Requests\AccessHistoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $user = User::factory()->create();
        $activation_date = $this->faker->dateTime();
        $deactivation_date = $this->faker->dateTime();

        $response = $this->post(route('access-history.store'), [
            'user_id' => $user->id,
            'activation_date' => $activation_date,
            'deactivation_date' => $deactivation_date,
        ]);

        $accessHistories = AccessHistory::query()
            ->where('user_id', $user->id)
            ->where('activation_date', $activation_date)
            ->where('deactivation_date', $deactivation_date)
            ->get();
        $this->assertCount(1, $accessHistories);
        $accessHistory = $accessHistories->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $accessHistory = AccessHistory::factory()->create();

        $response = $this->get(route('access-history.show', $accessHistory));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AccessHistoryController::class,
            'update',
            \App\Http\Requests\AccessHistoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $accessHistory = AccessHistory::factory()->create();
        $user = User::factory()->create();
        $activation_date = $this->faker->dateTime();
        $deactivation_date = $this->faker->dateTime();

        $response = $this->put(route('access-history.update', $accessHistory), [
            'user_id' => $user->id,
            'activation_date' => $activation_date,
            'deactivation_date' => $deactivation_date,
        ]);

        $accessHistory->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($user->id, $accessHistory->user_id);
        $this->assertEquals($activation_date, $accessHistory->activation_date);
        $this->assertEquals($deactivation_date, $accessHistory->deactivation_date);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $accessHistory = AccessHistory::factory()->create();

        $response = $this->delete(route('access-history.destroy', $accessHistory));

        $response->assertNoContent();

        $this->assertDeleted($accessHistory);
    }
}
