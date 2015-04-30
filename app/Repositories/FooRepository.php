<?php namespace App\Repositories;


use App\Article;

class FooRepository {

    public function get()
    {
        return Article::all();
    }
} 