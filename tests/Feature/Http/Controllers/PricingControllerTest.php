<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PricingController
 */
class PricingControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $pricings = Pricing::factory()->count(3)->create();

        $response = $this->get(route('pricing.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PricingController::class,
            'store',
            \App\Http\Requests\PricingStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $month = $this->faker->word;
        $number = $this->faker->randomFloat(/** float_attributes **/);
        $price = $this->faker->randomFloat(/** float_attributes **/);
        $discount = $this->faker->randomFloat(/** float_attributes **/);

        $response = $this->post(route('pricing.store'), [
            'month' => $month,
            'number' => $number,
            'price' => $price,
            'discount' => $discount,
        ]);

        $pricings = Pricing::query()
            ->where('month', $month)
            ->where('number', $number)
            ->where('price', $price)
            ->where('discount', $discount)
            ->get();
        $this->assertCount(1, $pricings);
        $pricing = $pricings->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $pricing = Pricing::factory()->create();

        $response = $this->get(route('pricing.show', $pricing));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PricingController::class,
            'update',
            \App\Http\Requests\PricingUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $pricing = Pricing::factory()->create();
        $month = $this->faker->word;
        $number = $this->faker->randomFloat(/** float_attributes **/);
        $price = $this->faker->randomFloat(/** float_attributes **/);
        $discount = $this->faker->randomFloat(/** float_attributes **/);

        $response = $this->put(route('pricing.update', $pricing), [
            'month' => $month,
            'number' => $number,
            'price' => $price,
            'discount' => $discount,
        ]);

        $pricing->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($month, $pricing->month);
        $this->assertEquals($number, $pricing->number);
        $this->assertEquals($price, $pricing->price);
        $this->assertEquals($discount, $pricing->discount);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $pricing = Pricing::factory()->create();

        $response = $this->delete(route('pricing.destroy', $pricing));

        $response->assertNoContent();

        $this->assertDeleted($pricing);
    }
}
