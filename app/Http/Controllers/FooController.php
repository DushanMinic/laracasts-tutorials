<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\FooRepository;

class FooController extends Controller
{
	public function __construct(FooRepository $repository){
		$this->repository = $repository;
		}
	
	
    public function foo(){
		return $this->repository->get();
		}
}
