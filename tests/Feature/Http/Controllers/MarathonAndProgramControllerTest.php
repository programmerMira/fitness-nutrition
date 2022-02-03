<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\MarathonAndProgram;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MarathonAndProgramController
 */
class MarathonAndProgramControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $marathonAndPrograms = MarathonAndProgram::factory()->count(3)->create();

        $response = $this->get(route('marathon-and-program.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MarathonAndProgramController::class,
            'store',
            \App\Http\Requests\MarathonAndProgramStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;
        $description = $this->faker->text;
        $price = $this->faker->word;
        $discount_price = $this->faker->word;
        $finish_date = $this->faker->dateTime();

        $response = $this->post(route('marathon-and-program.store'), [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'discount_price' => $discount_price,
            'finish_date' => $finish_date,
        ]);

        $marathonAndPrograms = MarathonAndProgram::query()
            ->where('name', $name)
            ->where('description', $description)
            ->where('price', $price)
            ->where('discount_price', $discount_price)
            ->where('finish_date', $finish_date)
            ->get();
        $this->assertCount(1, $marathonAndPrograms);
        $marathonAndProgram = $marathonAndPrograms->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $marathonAndProgram = MarathonAndProgram::factory()->create();

        $response = $this->get(route('marathon-and-program.show', $marathonAndProgram));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MarathonAndProgramController::class,
            'update',
            \App\Http\Requests\MarathonAndProgramUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $marathonAndProgram = MarathonAndProgram::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;
        $price = $this->faker->word;
        $discount_price = $this->faker->word;
        $finish_date = $this->faker->dateTime();

        $response = $this->put(route('marathon-and-program.update', $marathonAndProgram), [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'discount_price' => $discount_price,
            'finish_date' => $finish_date,
        ]);

        $marathonAndProgram->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $marathonAndProgram->name);
        $this->assertEquals($description, $marathonAndProgram->description);
        $this->assertEquals($price, $marathonAndProgram->price);
        $this->assertEquals($discount_price, $marathonAndProgram->discount_price);
        $this->assertEquals($finish_date, $marathonAndProgram->finish_date);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $marathonAndProgram = MarathonAndProgram::factory()->create();

        $response = $this->delete(route('marathon-and-program.destroy', $marathonAndProgram));

        $response->assertNoContent();

        $this->assertDeleted($marathonAndProgram);
    }
}
