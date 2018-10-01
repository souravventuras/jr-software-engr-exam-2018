<?php

namespace Tests\Feature;

use App\Developer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeveloperSystemViewTest extends TestCase
{
//    use DatabaseMigrations;
//
//    use RefreshDatabase;

    /**
     * @group search
     *
     * @return void
     */
    public function testSearchDeveloperWittLanguageProLang()
    {
        $this->get('/')
            ->assertSee('/developer');
    }
}
