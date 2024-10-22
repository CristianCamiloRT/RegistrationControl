<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VisitController extends Controller
{
    public function index(): View
    {
        $visits = Visit::all();
        return view('visits.index', compact('visits'));
    }

    public function create(): View
    {
        return view('visits.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Visit::create($request->all());
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

    public function update(Request $request, Visit $visit)
    {
        $visit->update($request->all());
        return redirect()->route('visits.index')->with('success', 'Visitante actualizado correctamente.');
    }

    public function destroy(Visit $visit)
    {
        $visit->delete();
        return redirect()->route('visits.index')->with('success', 'Visitante eliminado correctamente.');
    }
}
