<?php namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->composeLatestArticle();
    }

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

    private function composeLatestArticle()
    {

//        view()->composer('partials._nav', 'App\Http\Composers\NavigationComposer');

        view()->composer('partials._nav', function ($view) {
            $view->with('latest', Article::latest()->first());
        });
    }

}
