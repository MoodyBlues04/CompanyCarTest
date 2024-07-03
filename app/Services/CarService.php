<?php

namespace App\Services;

use App\Http\Requests\SearchCarRequest;
use App\Models\Car;
use Illuminate\Database\Eloquent\Builder;

class CarService
{
    public function search(SearchCarRequest $request): array
    {
        $query = Car::query()->with(['comfort', 'carBooks']);
        $query->whereDoesntHave('carBooks', function (Builder $q) use ($request) {
            $q->whereBetween('start_time', [$request->start_time, $request->end_time])
                ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
        });
        if ($request->post('comfort')) {
            $query = $query->whereHas('comfort', function (Builder $q) use ($request) {
                $q->where('value', $request->comfort);
            });
        }
        if ($request->post('model')) {
            $query = $query->where('model', 'like', "%{$request->model}%");
        }
        return $query->get()->all();
    }
}
