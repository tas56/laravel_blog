<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $page = Page::factory()->create();
        $page->title = "IS373";
        $page->body = "This is a test page";
        $page->published = true;
        $page->save();
        $user = User::find(1);
        $user->name = "Thomas Semiz";
        $user->save();
        $this->assertEquals("Thomas Semiz", $user->name);
        $page = $user->$page;
        dd($page);
    }
}
