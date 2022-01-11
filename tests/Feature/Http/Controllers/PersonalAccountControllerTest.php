<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\LifeStyle;
use App\Models\MenuCalories;
use App\Models\PersonalAccount;
use App\Models\ProblemZone;
use App\Models\TrainingLocation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PersonalAccountController
 */
class PersonalAccountControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $personalAccounts = PersonalAccount::factory()->count(3)->create();

        $response = $this->get(route('personal-account.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PersonalAccountController::class,
            'store',
            \App\Http\Requests\PersonalAccountStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $user = User::factory()->create();
        $age = $this->faker->numberBetween(-10000, 10000);
        $weight = $this->faker->randomFloat(/** float_attributes **/);
        $height = $this->faker->randomFloat(/** float_attributes **/);
        $dream_weight = $this->faker->randomFloat(/** float_attributes **/);
        $life_style = LifeStyle::factory()->create();
        $problem_zone = ProblemZone::factory()->create();
        $training_location = TrainingLocation::factory()->create();
        $menu_calories = MenuCalories::factory()->create();
        $hips_cm = $this->faker->randomFloat(/** float_attributes **/);
        $waist_cm = $this->faker->randomFloat(/** float_attributes **/);
        $chest_cm = $this->faker->randomFloat(/** float_attributes **/);
        $photos = $this->faker->;

        $response = $this->post(route('personal-account.store'), [
            'user_id' => $user->id,
            'age' => $age,
            'weight' => $weight,
            'height' => $height,
            'dream_weight' => $dream_weight,
            'life_style_id' => $life_style->id,
            'problem_zone_id' => $problem_zone->id,
            'training_location_id' => $training_location->id,
            'menu_calories_id' => $menu_calories->id,
            'hips_cm' => $hips_cm,
            'waist_cm' => $waist_cm,
            'chest_cm' => $chest_cm,
            'photos' => $photos,
        ]);

        $personalAccounts = PersonalAccount::query()
            ->where('user_id', $user->id)
            ->where('age', $age)
            ->where('weight', $weight)
            ->where('height', $height)
            ->where('dream_weight', $dream_weight)
            ->where('life_style_id', $life_style->id)
            ->where('problem_zone_id', $problem_zone->id)
            ->where('training_location_id', $training_location->id)
            ->where('menu_calories_id', $menu_calories->id)
            ->where('hips_cm', $hips_cm)
            ->where('waist_cm', $waist_cm)
            ->where('chest_cm', $chest_cm)
            ->where('photos', $photos)
            ->get();
        $this->assertCount(1, $personalAccounts);
        $personalAccount = $personalAccounts->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $personalAccount = PersonalAccount::factory()->create();

        $response = $this->get(route('personal-account.show', $personalAccount));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PersonalAccountController::class,
            'update',
            \App\Http\Requests\PersonalAccountUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $personalAccount = PersonalAccount::factory()->create();
        $user = User::factory()->create();
        $age = $this->faker->numberBetween(-10000, 10000);
        $weight = $this->faker->randomFloat(/** float_attributes **/);
        $height = $this->faker->randomFloat(/** float_attributes **/);
        $dream_weight = $this->faker->randomFloat(/** float_attributes **/);
        $life_style = LifeStyle::factory()->create();
        $problem_zone = ProblemZone::factory()->create();
        $training_location = TrainingLocation::factory()->create();
        $menu_calories = MenuCalories::factory()->create();
        $hips_cm = $this->faker->randomFloat(/** float_attributes **/);
        $waist_cm = $this->faker->randomFloat(/** float_attributes **/);
        $chest_cm = $this->faker->randomFloat(/** float_attributes **/);
        $photos = $this->faker->;

        $response = $this->put(route('personal-account.update', $personalAccount), [
            'user_id' => $user->id,
            'age' => $age,
            'weight' => $weight,
            'height' => $height,
            'dream_weight' => $dream_weight,
            'life_style_id' => $life_style->id,
            'problem_zone_id' => $problem_zone->id,
            'training_location_id' => $training_location->id,
            'menu_calories_id' => $menu_calories->id,
            'hips_cm' => $hips_cm,
            'waist_cm' => $waist_cm,
            'chest_cm' => $chest_cm,
            'photos' => $photos,
        ]);

        $personalAccount->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($user->id, $personalAccount->user_id);
        $this->assertEquals($age, $personalAccount->age);
        $this->assertEquals($weight, $personalAccount->weight);
        $this->assertEquals($height, $personalAccount->height);
        $this->assertEquals($dream_weight, $personalAccount->dream_weight);
        $this->assertEquals($life_style->id, $personalAccount->life_style_id);
        $this->assertEquals($problem_zone->id, $personalAccount->problem_zone_id);
        $this->assertEquals($training_location->id, $personalAccount->training_location_id);
        $this->assertEquals($menu_calories->id, $personalAccount->menu_calories_id);
        $this->assertEquals($hips_cm, $personalAccount->hips_cm);
        $this->assertEquals($waist_cm, $personalAccount->waist_cm);
        $this->assertEquals($chest_cm, $personalAccount->chest_cm);
        $this->assertEquals($photos, $personalAccount->photos);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $personalAccount = PersonalAccount::factory()->create();

        $response = $this->delete(route('personal-account.destroy', $personalAccount));

        $response->assertNoContent();

        $this->assertDeleted($personalAccount);
    }
}
