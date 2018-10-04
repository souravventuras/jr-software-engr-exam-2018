<?php

namespace Tests\Unit;

use App\Developer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Http\JsonResponse;

class DeveloperApiTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_fetches_developers()
    {
        $this->get('/api/developers')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id', 'email', 'languages', 'programming_languages', 'created_at', 'updated_at'
                    ]
                ]
            ]);
    }

    /** @test */
    public function it_fetches_a_single_developer()
    {
        $developer = factory(Developer::class)->create();
        $this->json('GET','/api/developers/1')
            ->assertJson([
                'data' => [
                    'id' => $developer->id,
                    'email' => $developer->email,
                    'languages' => [],
                    'programming_languages' => [],
                    'created_at' => $developer->created_at,
                    'updated_at' => $developer->updated_at,
                ]
            ]);
    }
}
