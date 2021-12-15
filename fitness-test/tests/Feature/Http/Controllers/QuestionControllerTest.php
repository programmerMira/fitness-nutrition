<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\QuestionController
 */
class QuestionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $questions = Question::factory()->count(3)->create();

        $response = $this->get(route('question.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\QuestionController::class,
            'store',
            \App\Http\Requests\QuestionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;
        $answer = $this->faker->word;

        $response = $this->post(route('question.store'), [
            'name' => $name,
            'answer' => $answer,
        ]);

        $questions = Question::query()
            ->where('name', $name)
            ->where('answer', $answer)
            ->get();
        $this->assertCount(1, $questions);
        $question = $questions->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $question = Question::factory()->create();

        $response = $this->get(route('question.show', $question));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\QuestionController::class,
            'update',
            \App\Http\Requests\QuestionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $question = Question::factory()->create();
        $name = $this->faker->name;
        $answer = $this->faker->word;

        $response = $this->put(route('question.update', $question), [
            'name' => $name,
            'answer' => $answer,
        ]);

        $question->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $question->name);
        $this->assertEquals($answer, $question->answer);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $question = Question::factory()->create();

        $response = $this->delete(route('question.destroy', $question));

        $response->assertNoContent();

        $this->assertDeleted($question);
    }
}
