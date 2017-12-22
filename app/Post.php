<?php

namespace App;

use Carbon\Carbon;


class Post extends Model
{
	public function comments()
	{

		return $this->hasMany(Comment::class); // Comment::class <- path representation of the full class path ('App\Comment') in php 5.5 and above people use Comment:class aproach
	}
	public function addComment($body)
	{
		$this->comments()->create(compact('body')); // this is also setting the ID of the post
		// One way of doing it
		// Comment::create([
		// 	'body' => request('body'),
		// 	'post_id' => $this->id
		// ]);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function scopeFilter($query, $filters)
	{
		// $posts = Post::latest()->get;
		//$posts = Post::orderBy('created_at', 'desc')->get();
		if (empty($filters))
		return ;
		if ($month = $filters['month']){
			$query->whereMonth('created_at', Carbon::parse($month)->month); // May as 5. June as 6 ...
		}	

		if ($year = $filters['year']){
			$query->whereYear('created_at', $year);
		}
	}
	public static function archives()
	{
		return static::selectRaw("to_char(created_at, 'YYYY') as year, to_char(created_at, 'Month') as month, count(*) as published")
			->groupBy('year', 'month')
			->orderByRaw('min(created_at) desc')
			->get()
			->toArray();
	}
	public function tags()
	{
		// Any post may have many tags
		// Any tag may be applied to many posts
		return $this->belongsToMany(Tag::class);
	}

}
