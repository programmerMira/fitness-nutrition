<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Day;
use App\Models\Training;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DaysController
 */
class DaysControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $days = Days::factory()->count(3)->create();

        $response = $this->get(route('day.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DaysController::class,
            'store',
            \App\Http\Requests\DaysStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $training = Training::factory()->create();
        $day_number = $this->faker->numberBetween(-10000, 10000);
        $name = $this->faker->name;
        $description = $this->faker->text;
        $videos = $this->faker->;

        $response = $this->post(route('day.store'), [
            'training_id' => $training->id,
            'day_number' => $day_number,
            'name' => $name,
            'description' => $description,
            'videos' => $videos,
        ]);

        $days = Day::query()
            ->where('training_id', $training->id)
            ->where('day_number', $day_number)
            ->where('name', $name)
            ->where('description', $description)
            ->where('videos', $videos)
            ->get();
        $this->assertCount(1, $days);
        $day = $days->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $day = Days::factory()->create();

        $response = $this->get(route('day.show', $day));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DaysController::class,
            'update',
            \App\Http\Requests\DaysUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $day = Days::factory()->create();
        $training = Training::factory()->create();
        $day_number = $this->faker->numberBetween(-10000, 10000);
        $name = $this->faker->name;
        $description = $this->faker->text;
        $videos = $this->faker->;

        $response = $this->put(route('day.update', $day), [
            'training_id' => $training->id,
            'day_number' => $day_number,
            'name' => $name,
            'description' => $description,
            'videos' => $videos,
        ]);

        $day->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($training->id, $day->training_id);
        $this->assertEquals($day_number, $day->day_number);
        $this->assertEquals($name, $day->name);
        $this->assertEquals($description, $day->description);
        $this->assertEquals($videos, $day->videos);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $day = Days::factory()->create();
        $day = Day::factory()->create();

        $response = $this->delete(route('day.destroy', $day));

        $response->assertNoContent();

        $this->assertDeleted($day);
    }
}
