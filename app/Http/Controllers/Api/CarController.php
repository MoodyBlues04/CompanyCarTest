<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchCarRequest;
use App\Models\Car;
use App\Services\CarService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct(private readonly CarService $carService)
    {
        $this->middleware('auth:sanctum');
    }

    public function search(SearchCarRequest $request): \Illuminate\Http\JsonResponse
    {
        $cars = $this->carService->search($request);
        return response()->json(['ok' => true, 'data' => $cars]);
    }

    public function book(Car $car)
    {
//        todo check if can
    }
}
