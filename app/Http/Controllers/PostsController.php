<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Repositories\Posts;
use Illuminate\Http\Request;
class PostsController extends Controller
{
	public function __construct()	
	{
		$this->middleware('auth')->except('index', 'show');
	}
	public function index(Tag $tag) // automat ic resolution / dependency injection Laravel Features!!
	{
		//return session('message');
		//$posts = $posts->all();
		//$posts = (new \App\Repositories\Posts)->all();
		$posts = Post::latest()
		->filter(request(['month', 'year']))
		->get();
		
		return view('posts.index', compact('posts'));
	}
	public function show(Post $post)
	{
		return view('posts.show', compact('post'));
	}

	public function create()
	{
		return view('posts.create');
	}

	public function store()
	{
		//dd(request()->all());
		//dd(request('title', 'body'));
		//dd(request('title');


		/*// Create a new post using the request data

		$post = new \App\Post; // careful namespaces!!! "\" at beginning means, back at the root because we are not using "use App\Post;"
		$post->title = request('title');
		$post->body = request('body');

		// Save it to the database
		$post->save();*/
		$this->validate(request(),[
			'title' => 'required',
			'body' => 'required'
		]);
		auth()->user()->publish(
			new Post(request(['title', 'body']))
		);

		session()->flash(
			'message', 'Post published!!'
		);

		// flash('Post published!!');
		
		// Post::create([
		// 		'title' => request('title'),
		// 		'body' => request('body'),
		// 		'user_id' => auth()->id()
		// ]);
		// And then redirect to the home page
		return redirect()->home();
	}
}
