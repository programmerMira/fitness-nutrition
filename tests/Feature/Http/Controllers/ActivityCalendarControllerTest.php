<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ActivityCalendar;
use App\Models\TrainingUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ActivityCalendarController
 */
class ActivityCalendarControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $activityCalendars = ActivityCalendar::factory()->count(3)->create();

        $response = $this->get(route('activity-calendar.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ActivityCalendarController::class,
            'store',
            \App\Http\Requests\ActivityCalendarStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $training_user = TrainingUser::factory()->create();
        $level = $this->faker->numberBetween(-10000, 10000);
        $day = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('activity-calendar.store'), [
            'training_user_id' => $training_user->id,
            'level' => $level,
            'day' => $day,
        ]);

        $activityCalendars = ActivityCalendar::query()
            ->where('training_user_id', $training_user->id)
            ->where('level', $level)
            ->where('day', $day)
            ->get();
        $this->assertCount(1, $activityCalendars);
        $activityCalendar = $activityCalendars->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $activityCalendar = ActivityCalendar::factory()->create();

        $response = $this->get(route('activity-calendar.show', $activityCalendar));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ActivityCalendarController::class,
            'update',
            \App\Http\Requests\ActivityCalendarUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $activityCalendar = ActivityCalendar::factory()->create();
        $training_user = TrainingUser::factory()->create();
        $level = $this->faker->numberBetween(-10000, 10000);
        $day = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('activity-calendar.update', $activityCalendar), [
            'training_user_id' => $training_user->id,
            'level' => $level,
            'day' => $day,
        ]);

        $activityCalendar->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($training_user->id, $activityCalendar->training_user_id);
        $this->assertEquals($level, $activityCalendar->level);
        $this->assertEquals($day, $activityCalendar->day);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $activityCalendar = ActivityCalendar::factory()->create();

        $response = $this->delete(route('activity-calendar.destroy', $activityCalendar));

        $response->assertNoContent();

        $this->assertDeleted($activityCalendar);
    }
}
