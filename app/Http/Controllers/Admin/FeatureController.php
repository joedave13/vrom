<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Feature\StoreFeatureRequest;
use App\Http\Requests\Admin\Feature\UpdateFeatureRequest;
use App\Models\Car;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Car $car)
    {
        return view('pages.admin.feature.create', compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeatureRequest $request, Car $car)
    {
        $data = $request->safe()->all();

        $car->features()->create($data);

        return redirect()->route('admin.car.show', $car);
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('pages.admin.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $data = $request->safe()->all();

        $feature->update($data);

        return redirect()->route('admin.car.show', $feature->car_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        //
    }
}
