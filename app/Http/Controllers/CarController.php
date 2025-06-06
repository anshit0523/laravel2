<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    
    public function index()
    {
         $cars = Car::all();
        return view('index', compact('cars'));
    }

     public function create()
    {
        return view('create');

    }

  
 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'year' => 'required|integer',
        ]);

        Car::create($request->all());
        return redirect()->route('cars.index')->with('success', 'Car added successfully');

    }

  
    public function edit(Car $car)
    {
        return view('edit', compact('car'));

    }

  
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'year' => 'required|integer',
        ]);

        $car->update($request->all());
        return redirect()->route('cars.index')->with('success', 'Car updated successfully');

    }

 
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }
}
