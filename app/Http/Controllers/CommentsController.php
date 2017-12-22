<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
	public function store(Post $post)
	{
		$this->validate(request(), ['body' => 'required|min:2']); // minimum of 2 characters? for expample (so we have an error to debug)
		$post->addComment(request('body'));
		// Add a comment to a post
		return back();
	}
}
