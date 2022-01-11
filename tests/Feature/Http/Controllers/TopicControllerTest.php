<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Topic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TopicController
 */
class TopicControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $topics = Topic::factory()->count(3)->create();

        $response = $this->get(route('topic.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TopicController::class,
            'store',
            \App\Http\Requests\TopicStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;

        $response = $this->post(route('topic.store'), [
            'name' => $name,
        ]);

        $topics = Topic::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $topics);
        $topic = $topics->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $topic = Topic::factory()->create();

        $response = $this->get(route('topic.show', $topic));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TopicController::class,
            'update',
            \App\Http\Requests\TopicUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $topic = Topic::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('topic.update', $topic), [
            'name' => $name,
        ]);

        $topic->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $topic->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $topic = Topic::factory()->create();

        $response = $this->delete(route('topic.destroy', $topic));

        $response->assertNoContent();

        $this->assertDeleted($topic);
    }
}
