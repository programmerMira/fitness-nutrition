<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\PhysicsParameter;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PhysicsParametersController
 */
class PhysicsParametersControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $physicsParameters = PhysicsParameters::factory()->count(3)->create();

        $response = $this->get(route('physics-parameter.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PhysicsParametersController::class,
            'store',
            \App\Http\Requests\PhysicsParametersStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $user = User::factory()->create();
        $weight = $this->faker->randomFloat(/** float_attributes **/);
        $height = $this->faker->randomFloat(/** float_attributes **/);
        $dream_weight = $this->faker->randomFloat(/** float_attributes **/);
        $hips_cm = $this->faker->randomFloat(/** float_attributes **/);
        $waist_cm = $this->faker->randomFloat(/** float_attributes **/);
        $chest_cm = $this->faker->randomFloat(/** float_attributes **/);

        $response = $this->post(route('physics-parameter.store'), [
            'user_id' => $user->id,
            'weight' => $weight,
            'height' => $height,
            'dream_weight' => $dream_weight,
            'hips_cm' => $hips_cm,
            'waist_cm' => $waist_cm,
            'chest_cm' => $chest_cm,
        ]);

        $physicsParameters = PhysicsParameter::query()
            ->where('user_id', $user->id)
            ->where('weight', $weight)
            ->where('height', $height)
            ->where('dream_weight', $dream_weight)
            ->where('hips_cm', $hips_cm)
            ->where('waist_cm', $waist_cm)
            ->where('chest_cm', $chest_cm)
            ->get();
        $this->assertCount(1, $physicsParameters);
        $physicsParameter = $physicsParameters->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $physicsParameter = PhysicsParameters::factory()->create();

        $response = $this->get(route('physics-parameter.show', $physicsParameter));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PhysicsParametersController::class,
            'update',
            \App\Http\Requests\PhysicsParametersUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $physicsParameter = PhysicsParameters::factory()->create();
        $user = User::factory()->create();
        $weight = $this->faker->randomFloat(/** float_attributes **/);
        $height = $this->faker->randomFloat(/** float_attributes **/);
        $dream_weight = $this->faker->randomFloat(/** float_attributes **/);
        $hips_cm = $this->faker->randomFloat(/** float_attributes **/);
        $waist_cm = $this->faker->randomFloat(/** float_attributes **/);
        $chest_cm = $this->faker->randomFloat(/** float_attributes **/);

        $response = $this->put(route('physics-parameter.update', $physicsParameter), [
            'user_id' => $user->id,
            'weight' => $weight,
            'height' => $height,
            'dream_weight' => $dream_weight,
            'hips_cm' => $hips_cm,
            'waist_cm' => $waist_cm,
            'chest_cm' => $chest_cm,
        ]);

        $physicsParameter->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($user->id, $physicsParameter->user_id);
        $this->assertEquals($weight, $physicsParameter->weight);
        $this->assertEquals($height, $physicsParameter->height);
        $this->assertEquals($dream_weight, $physicsParameter->dream_weight);
        $this->assertEquals($hips_cm, $physicsParameter->hips_cm);
        $this->assertEquals($waist_cm, $physicsParameter->waist_cm);
        $this->assertEquals($chest_cm, $physicsParameter->chest_cm);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $physicsParameter = PhysicsParameters::factory()->create();
        $physicsParameter = PhysicsParameter::factory()->create();

        $response = $this->delete(route('physics-parameter.destroy', $physicsParameter));

        $response->assertNoContent();

        $this->assertDeleted($physicsParameter);
    }
}
