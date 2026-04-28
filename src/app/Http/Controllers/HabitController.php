<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\HabitRequest;
use App\Models\HabitLogs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class HabitController extends Controller
{

    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $habits = Auth::user()->habits()
        ->with('habitLogs')
        ->get();

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

        Auth::user()->habits()->create($validated);
        
        return redirect()->route('habits.index')->with('success', 'Abitudine creata con sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit)
    {
        $this->authorize('update', $habit);
        
        return view('habit/edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
        $this->authorize('update', $habit);

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
        
        $this->authorize('delete', $habit);
        
        $habit->delete();

        return redirect()
        ->route('habits.index')
        ->with('success', 'hai rimosso l\'abitudine!');
    }


    public function settings()
    {
        $habits = Auth::user()->habits;
        return view('habit/settings', compact('habits'));
    }

    public function toggle(Habit $habit)
    {
        //Verificare se puo fare l'azione
        if($habit->user_id !== Auth::user()->id){
            abort(403, 'Quest\'abitudine non è tua!');
        }
        //Che giorno è oggi
        $today = Carbon::today()->toDateString();

        //Prendere il log
        $log = HabitLogs::query()     
        ->where('user_id', Auth::user()->id)
        ->where('habit_id', $habit->id)
        ->where('completed_at', $today)
        ->first();

        //Validare se nella data esiste il registro

        if($log){
            //Se esiste, rimuovere il registro
            $log->delete();
            $message = 'Abitudine non conclusa!';
        }
        else{
            //Se non esiste, crea il registro
            HabitLogs::create(
                [
                'user_id' => Auth::user()->id,
                'habit_id' => $habit->id,
                'completed_at' => $today,
                ]
            );
            $message = 'Abitudine conclusa!';
        }
        //Ritornare alla pagina precendente
        return redirect()
        ->route('habits.index')
        ->with('success', $message);

    }
}
