<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\TrainingLocation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TrainingLocationController
 */
class TrainingLocationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $trainingLocations = TrainingLocation::factory()->count(3)->create();

        $response = $this->get(route('training-location.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TrainingLocationController::class,
            'store',
            \App\Http\Requests\TrainingLocationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;

        $response = $this->post(route('training-location.store'), [
            'name' => $name,
        ]);

        $trainingLocations = TrainingLocation::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $trainingLocations);
        $trainingLocation = $trainingLocations->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $trainingLocation = TrainingLocation::factory()->create();

        $response = $this->get(route('training-location.show', $trainingLocation));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TrainingLocationController::class,
            'update',
            \App\Http\Requests\TrainingLocationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $trainingLocation = TrainingLocation::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('training-location.update', $trainingLocation), [
            'name' => $name,
        ]);

        $trainingLocation->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $trainingLocation->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $trainingLocation = TrainingLocation::factory()->create();

        $response = $this->delete(route('training-location.destroy', $trainingLocation));

        $response->assertNoContent();

        $this->assertDeleted($trainingLocation);
    }
}
