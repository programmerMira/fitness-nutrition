<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TrainingUserController
 */
class TrainingUserControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $trainingUsers = TrainingUser::factory()->count(3)->create();

        $response = $this->get(route('training-user.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TrainingUserController::class,
            'store',
            \App\Http\Requests\TrainingUserStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $user = User::factory()->create();
        $training = Training::factory()->create();

        $response = $this->post(route('training-user.store'), [
            'user_id' => $user->id,
            'training_id' => $training->id,
        ]);

        $trainingUsers = TrainingUser::query()
            ->where('user_id', $user->id)
            ->where('training_id', $training->id)
            ->get();
        $this->assertCount(1, $trainingUsers);
        $trainingUser = $trainingUsers->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $trainingUser = TrainingUser::factory()->create();

        $response = $this->get(route('training-user.show', $trainingUser));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TrainingUserController::class,
            'update',
            \App\Http\Requests\TrainingUserUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $trainingUser = TrainingUser::factory()->create();
        $user = User::factory()->create();
        $training = Training::factory()->create();

        $response = $this->put(route('training-user.update', $trainingUser), [
            'user_id' => $user->id,
            'training_id' => $training->id,
        ]);

        $trainingUser->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($user->id, $trainingUser->user_id);
        $this->assertEquals($training->id, $trainingUser->training_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $trainingUser = TrainingUser::factory()->create();

        $response = $this->delete(route('training-user.destroy', $trainingUser));

        $response->assertNoContent();

        $this->assertDeleted($trainingUser);
    }
}
