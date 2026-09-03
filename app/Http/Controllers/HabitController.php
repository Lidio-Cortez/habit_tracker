<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\HabitRequest;

class HabitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(): view{
        $habits = auth()->user()->habits;
        return view('dashboard', compact('habits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('habit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitRequest $request)
    {
        $validated = $request->validated();

        auth()->user()->habits()->create($validated);

        return redirect()
                ->route('site.dashboard')
                ->with('success', 'Hábito criado com sucesso! ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Habit $habit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit): view
    {
        return view('habit.edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
        if($habit->user_id !== auth()->id()){
            abort(403, 'Não tens acesso para apagar este hábito');
        }

        $habit->update($request->all());

         return redirect()
                ->route('site.dashboard')
                ->with('success', 'Hábito foi actualizado com sucesso! ');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        if($habit->user_id !== auth()->id()){
            abort(403, 'Não tens acesso para apagar este hábito');
        }

        $habit->delete();
    
        return redirect()
                ->route('site.dashboard')
                ->with('success', 'Hábito apagado com sucesso! ');  
    }
}
