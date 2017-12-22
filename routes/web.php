<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// u can import namespaces!! (so TASK is Task, and not App\Tasks)
use App\Task;

//dd(resolve('App\Billing\Stripe'));


Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts', 'PostsController@index')->name('home');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
// controller -> PostsController or PostController
// eloquent model -> Post
// migration -> create_posts_table
//_____________________

Route::get('/tasks', 'TasksController@index');

Route::get('/tasks/{task}', 'TasksController@show');



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/about', function () {
    return view('about');
});

Route::get('/tests', function () {

    //this kind of code will go to Controllers!
    $tasks = [
        'Do this',
        'Do that',
        'Do also this'
    ];

    return view(
        'tests',
        [
        'var1' => 'Pepe',
        'var2' => 'Juan',
        'var3' => 'Lola',
        'var4' => 'Alvaro',
        'var5' => 'Pepe',
        'var6' => 'Pablo'
        ],
        compact('tasks')
    );
});

/* trying stupid things! */
Route::get('/', 'PostsController@index');

/* reporting new feature! */
Route::get('/features', function () {
    return "yuuhuu";
});
