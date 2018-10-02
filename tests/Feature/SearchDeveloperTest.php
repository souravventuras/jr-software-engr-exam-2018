<?php

namespace Tests\Feature;

use App\Developer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchDeveloperTest extends TestCase
{
//    use DatabaseMigrations;
//
//    use RefreshDatabase;

    /**
     * @group search
     *
     * @return void
     */

    public function testSearchDeveloper()
    {
        $response = $this->get('developers', [
            'pro_lang' => 'PHP'
        ]);
        $this->assertEquals($response->status(), 200);
    }

    /**
     * @group search
     *
     * @return void
     */
    public function testSearchDeveloperWittLanguageProLang()
    {
        $response = $this->get('developers', [
            'pro_lang' => 'PHP',
            'lang' => 'en'
        ]);
        $this->assertEquals($response->status(), 200);
    }
}
