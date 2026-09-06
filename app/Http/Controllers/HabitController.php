<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\HabitRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\HabitLog;
use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class HabitController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
     public function index(): view{
        $habits = Auth::user()->habits()
                              ->with('habbitLogs')
                              ->get();

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

        Auth::user()->habits()->create($validated);

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
         $this->authorize('update', $habit);

        return view('habit.edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
        $this->authorize('update', $habit);

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
       $this->authorize('delete', $habit);

        $habit->delete();
    
        return redirect()
                ->route('site.dashboard')
                ->with('success', 'Hábito apagado com sucesso! ');  
    }
    public function settings(): view
    {
        $habits = Auth::user()->habits;
        return view('habit.settings', compact('habits'));
    }
    public function toggle(Habit $habit)
    {
       $this->authorize('toggle', $habit);

        $today = Carbon::today()->toDateString();

        $log = HabitLog::where('habit_id', $habit->id)
                    ->whereDate('created_at', $today)
                    ->first();

        if ($log) {
            $log->delete();
            $message = 'Hábito desmarcado como concluído para hoje.';
        } else {
            HabitLog::create([
                'user_id' => Auth::user()->id,
                'habit_id' => $habit->id,
                'completed_at' => $today,
            ]);
            $message = 'Hábito marcado como concluído para hoje.';
        }

        return redirect()
                ->route('habits.index')
                ->with('success', $message);  
    }
    public function history(): view
    {
        $selectedYear = Carbon::now()->year;

        $startDate = Carbon::create($selectedYear, 1, 1);
        $endDate = Carbon::create($selectedYear, 12, 31, 23, 59, 59);

        $habits = Auth::user()->habits()
                              ->with(['habbitLogs' => function ($query) use ($startDate, $endDate) {
                                  $query->whereBetween('completed_at', [$startDate, $endDate]);
                              }])
                              ->get();

        return view('habit.history', compact('habits', 'selectedYear'));
    }
}
