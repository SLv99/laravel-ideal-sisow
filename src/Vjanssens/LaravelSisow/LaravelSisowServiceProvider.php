<?php namespace Vjanssens\LaravelSisow;

use Illuminate\Support\ServiceProvider;

class LaravelSisowServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{

		$this->package('slv99/laravel-sisow');

		$app = $this->app;
		
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['sisow'] = $this->app->share(function($app)
        {
            return new Sisow($app['config']);
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('sisow');
	}

}