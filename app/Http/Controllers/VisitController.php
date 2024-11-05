<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public function index(): View
    {
        $visits = Visit::latest()->paginate(20);
        return view('visits.index', compact('visits'));
    }

    public function create(): View
    {
        return view('visits.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:120',
            'document' => 'required|string|max:30',
            'interior' => 'required|integer',
            'house' => 'required|integer',
            'authorized_by' => 'required|string|max:120',
            'entry_date' => 'required|date_format:Y-m-d\TH:i',
        ]);

        
        $data = $request->all();
        
        $data['entry_date'] = date('Y-m-d H:i', strtotime($request->entry_date));
        $data['user_id'] = Auth::id();

        Visit::create($data);

        return redirect()->route('visits.index')->with('success', 'Visitante registrado correctamente.');
    }

    public function show(Visit $visit): View
    {
        return view('visits.show', compact('visit'));
    }

    public function edit(Visit $visit): View
    {
        return view('visits.edit', compact('visit'));
    }

    public function update(Request $request, Visit $visit): RedirectResponse
    {
        $visit->update($request->all());
        return redirect()->route('visits.index')->with('success', 'Visitante actualizado correctamente.');
    }

    public function destroy(Visit $visit): RedirectResponse
    {
        $visit->delete();
        return redirect()->route('visits.index')->with('success', 'Visitante eliminado correctamente.');
    }

    public function exit(Visit $visit): RedirectResponse
    {
        $visit->exit_date = date('Y-m-d H:i');
        $visit->update();
        return redirect()->route('visits.index')->with('success', 'Se dio salida correctamente.');
    }
}
