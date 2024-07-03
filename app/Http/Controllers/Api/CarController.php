<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.sanctum');
    }

    public function search(SearchCarRequest $request)
    {
//        todo search for car
    }

    public function book(Car $car)
    {
//        todo check if can
    }
}
