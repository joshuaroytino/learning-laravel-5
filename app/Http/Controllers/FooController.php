<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\FooRepository;
use Illuminate\Http\Request;

class FooController extends Controller {

    /**
     * This is constructor injection
     *
     * @var FooRepository
     */
    private $repository;

    public function __construct(FooRepository $repository)
    {

        $this->repository = $repository;
    }

	public function foo()
    {
        return $this->repository->get();
    }

}
