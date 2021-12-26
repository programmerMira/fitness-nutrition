<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingLocation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TrainingController
 */
class TrainingControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $trainings = Training::factory()->count(3)->create();

        $response = $this->get(route('training.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TrainingController::class,
            'store',
            \App\Http\Requests\TrainingStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $training_location = TrainingLocation::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;
        $training_days = $this->faker->;

        $response = $this->post(route('training.store'), [
            'training_location_id' => $training_location->id,
            'name' => $name,
            'description' => $description,
            'training_days' => $training_days,
        ]);

        $trainings = Training::query()
            ->where('training_location_id', $training_location->id)
            ->where('name', $name)
            ->where('description', $description)
            ->where('training_days', $training_days)
            ->get();
        $this->assertCount(1, $trainings);
        $training = $trainings->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $training = Training::factory()->create();

        $response = $this->get(route('training.show', $training));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TrainingController::class,
            'update',
            \App\Http\Requests\TrainingUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $training = Training::factory()->create();
        $training_location = TrainingLocation::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;
        $training_days = $this->faker->;

        $response = $this->put(route('training.update', $training), [
            'training_location_id' => $training_location->id,
            'name' => $name,
            'description' => $description,
            'training_days' => $training_days,
        ]);

        $training->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($training_location->id, $training->training_location_id);
        $this->assertEquals($name, $training->name);
        $this->assertEquals($description, $training->description);
        $this->assertEquals($training_days, $training->training_days);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $training = Training::factory()->create();

        $response = $this->delete(route('training.destroy', $training));

        $response->assertNoContent();

        $this->assertDeleted($training);
    }
}
