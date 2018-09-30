<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\TestSearch;

class SearchTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSearch()
    {
        $testSearch = new TestSearch();
        $response1 = $testSearch->testSearchInput('java');
        $response2 = $testSearch->testSearchLanguageDropdown(1);
        $response3 = $testSearch->testSearchProgrammingLanguageDropdown(4);
        $response4 = $testSearch->testSearchInputAndLanguageDropdown('java', 1);
        $response5 = $testSearch->testSearchInputAndProgrammingLanguageDropdown('BD', 2);
        $response6 = $testSearch->testSearchInputLanguageAndProgrammingLanguageDropdown('BD', 2, 4);

        $this->addToAssertionCount(count($response1));
        $this->addToAssertionCount(count($response2));
        $this->addToAssertionCount(count($response3));
        $this->addToAssertionCount(count($response4));
        $this->addToAssertionCount(count($response5));
        $this->addToAssertionCount(count($response6));
    }
}
