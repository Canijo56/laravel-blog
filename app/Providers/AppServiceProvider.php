<?php

namespace App\Providers;

use App\Billing\Stripe;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    //protected $defer = true;
    //only loaded when requested if true
    // if u have something in boot method it must be loaded constantly, so cant be true

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function ($view) {
            $tags = \App\Tag::has('posts')->pluck('name');
            $archives = \App\Post::archives();

            $view->with(compact('archives', 'tags'));
        });
    }

    /**
     * Register any application services.
     *

     * @return void
     */


    public function register()
    {
        // App::bind('App\Billing\Stripe', function () {
    // \App::singleton('App\Billing\Stripe', function () {
    // \App::singleton('App\Billing\Stripe', function ($app) {
    $this->app->singleton(Stripe::class, function () { // singleton is a single instance of a class
        return new Stripe(config('services.stripe.secret'));
    });
        // $stripe = resolve('App\Billing\Stripe'); // valid
    // $stripe = app('App\Billing\Stripe'); // valid
    // $stripe = App::make('App\Billing\Stripe'); // valid
    // App::instance('App\Billing\Stripe', $stripe); // u can substitute the instance of the class u have created

    // dd($stripe);
    }
}
