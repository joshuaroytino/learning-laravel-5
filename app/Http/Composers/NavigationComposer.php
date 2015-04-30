<?php namespace App\Http\Composers;

use App\Article;

class NavigationComposer {

    public function compose($view)
    {
        $view->with('latest', Article::latest()->first());
    }
} 