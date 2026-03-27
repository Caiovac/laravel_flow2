<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\HabitRequest;


class HabitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $habits = auth()->user()->habits;
        return view('dashboard', compact('habits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('habit/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitRequest $request)
    {
        $validated = $request->validated();

        auth()->user()->habits()->create($validated);
        
        return redirect()->route('habits.index')->with('success', 'Abitudine creata con sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit)
    {
        return view('habit/edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
        if($habit->user_id !== auth()->user()->id){
            abort(403, 'Quest\'abitudine non è tua!');
        }
        $habit->update($request->all());
        

        return redirect()
        ->route('habits.index')
        ->with('success', 'La tua abitudine è stata aggiornata con successo! ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        
        if($habit->user_id !== auth()->user()->id){
            abort(403, 'Quest\'abitudine non è tua!');
        }
        
        $habit->delete();

        return redirect()
        ->route('habits.index')
        ->with('success', 'hai rimosso l\'abitudine!');
    }


    public function settings() : View
    {
        $habits = auth()->user()->habits;
        return view('habit/settings', compact('habits'));
    }
}
