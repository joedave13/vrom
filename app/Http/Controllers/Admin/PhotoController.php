<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Photo\StorePhotoRequest;
use App\Models\Car;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
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
        return view('pages.admin.photo.create', compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request, Car $car)
    {
        if ($request->file('photo')->isValid()) {
            $data['url'] = $request->file('photo')->store('car/photo', 'public');

            $car->photos()->create($data);

            return redirect()->route('admin.car.show', $car);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
