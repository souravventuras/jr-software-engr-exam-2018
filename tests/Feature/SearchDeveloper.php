<?php

namespace Tests\Feature;

use SimpleSearch\Repository\DeveloperRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchDeveloper extends TestCase
{


    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_developer_search_by_programming_language()
    {
        $response = $this->get('/?programming_language=php');
        $response->assertSee($response);
    }
}
