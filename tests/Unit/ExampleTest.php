<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
	// !!!!!
	//rolls back database at the end of test!!!!!
	use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
       // $this->assertTrue(true);
       // $this->get('/')->assertSee('Abdsout');

        // Given I have two records in the database that are posts
        // and each one is posted a month apart
        $first = factory(Post::class)->create();
        $second = factory(Post::class)->create([
        	'created_at' => \Carbon\Carbon::now()->subMonth()
        ]); // one month before

        // When I fetch the archives.
        $posts = Post::archives();
        // Then the response should be in the proper format
        $this->assertEquals([
        	[
        		'year' => $first->created_at->format('Y'),
        		'published' => 1,
        		'month' => $first->created_at->format('F').' '
        	],
        	[
        		'year' => $second->created_at->format('Y'),
        		'published' => 1,
        		'month' => $second->created_at->format('F').' '
        	]
        ], $posts);
    }
}
