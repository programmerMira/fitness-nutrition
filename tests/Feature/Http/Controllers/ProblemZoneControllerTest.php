<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ProblemZone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProblemZoneController
 */
class ProblemZoneControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $problemZones = ProblemZone::factory()->count(3)->create();

        $response = $this->get(route('problem-zone.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProblemZoneController::class,
            'store',
            \App\Http\Requests\ProblemZoneStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;

        $response = $this->post(route('problem-zone.store'), [
            'name' => $name,
        ]);

        $problemZones = ProblemZone::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $problemZones);
        $problemZone = $problemZones->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $problemZone = ProblemZone::factory()->create();

        $response = $this->get(route('problem-zone.show', $problemZone));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProblemZoneController::class,
            'update',
            \App\Http\Requests\ProblemZoneUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $problemZone = ProblemZone::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('problem-zone.update', $problemZone), [
            'name' => $name,
        ]);

        $problemZone->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $problemZone->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $problemZone = ProblemZone::factory()->create();

        $response = $this->delete(route('problem-zone.destroy', $problemZone));

        $response->assertNoContent();

        $this->assertDeleted($problemZone);
    }
}
