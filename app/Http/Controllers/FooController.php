<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\FooRepository;
use Illuminate\Http\Request;

class FooController extends Controller {


    /**
     * This is method injection
     *
     * @param FooRepository $repository
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function foo(FooRepository $repository)
    {
        return $repository->get();
    }

}
