<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VehicleController extends Controller
{
    public function index(): View
    {
        $vehicles = Vehicle::latest()->paginate(20);
        return view('vehicles.index', compact('vehicles'));
    }

    public function create(): View
    {
        return view('vehicles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'entry_date' => 'required|date_format:Y-m-d\TH:i',
            'interior' => 'required|integer',
            'house' => 'required|integer',
            'plate' => 'required|string|max:8',
            'brand' => 'required|string|max:30',
            'left_state' => 'required|string|max:10',
            'right_state' => 'required|string|max:10',
            'back_state' => 'required|string|max:10',
            'front_state' => 'required|string|max:10',
            'antenna' => 'required|boolean',
            'frontal' => 'required|boolean',
            'spare_parts' => 'required|boolean',
            'mirrors' => 'required|boolean',
            'lights' => 'required|boolean',
            'stops' => 'required|boolean',
            'glasses' => 'required|boolean'
        ]);

                
        $data = $request->all();
        
        $data['entry_date'] = date('Y-m-d H:i', strtotime($request->entry_date));
        $data['user_id'] = Auth::id();

        Vehicle::create($data);

        return redirect()->route('vehicles.index')->with('success', 'Vehiculo registrado correctamente.');
    }

    public function show(Vehicle $vehicle): View
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle): View
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle): RedirectResponse
    {
        $vehicle->update($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Vehiculo actualizado correctamente.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehiculo eliminado correctamente.');
    }

    public function exit(Vehicle $vehicle): RedirectResponse
    {
        $vehicle->exit_date = Carbon::now()->format('Y-m-d H:i');

        $entryDate = new Carbon($vehicle->entry_date);
        $minutes = $entryDate->diffInMinutes($vehicle->exit_date);

        $vehicle->minutes = $minutes;
        $vehicle->update();

        return redirect()->route('vehicles.index')->with('success', 'Se dio salida correctamente.');
    }
}
