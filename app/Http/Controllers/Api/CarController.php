<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookCarRequest;
use App\Http\Requests\SearchCarRequest;
use App\Models\Car;
use App\Services\CarService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function __construct(private readonly CarService $carService)
    {
        $this->middleware('auth:sanctum');
    }

    public function search(SearchCarRequest $request): JsonResponse
    {
        $cars = $this->carService->search($request);
        return response()->json(['ok' => true, 'data' => $cars]);
    }

    public function book(Car $car, BookCarRequest $request): JsonResponse
    {
        if (!$car->canBook($request->start_time, $request->end_time)) {
            throw new \InvalidArgumentException("You cannot book this period of time");
        }

        $book = $car->carBooks()->create([
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json(['ok' => true, 'data' => $book->toArray()]);
    }
}
