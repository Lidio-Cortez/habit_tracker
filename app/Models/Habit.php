<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Carbon\Carbon;

class Habit extends Model
{
      use HasFactory;

    protected $fillable = [
        'user_id',
        'name'
    ];
    public function user(): belongsTo{
        return $this->belongsTo(User::class);
    }
    public function habbitLogs(): hasMany{
        return $this->hasMany(HabitLog::class);
    }
    public function wasCompletedToday(): bool{
         $wasCompletedToday = $this->habbitLogs
                                   ->where('completed_at', Carbon::today()->toDateString())
                                   ->isNotEmpty();
         return $wasCompletedToday;
    }
    public function wasCompletedOn(Carbon $date): bool{
        return $this->habbitLogs
                    ->where('completed_at', $date->toDateString())
                    ->isNotEmpty();
    }
    public static function generateYearGrid(int $year): array{
        
        $startOfYear = Carbon::create($year, 1, 1);
        $endOfYear = Carbon::create($year, 12, 31, 23, 59, 59);
        
        $weeks = [];
        $currentWeek = [];

        $firstDayOfYear = $startOfYear->dayOfWeek;

        for ($x = 0; $x < $firstDayOfYear; $x++) {
            $currentWeek[] = null;
        }

        for ($date = $startOfYear->copy(); $date->lte($endOfYear); $date->addDay()) { 
            $currentWeek[] = $date->copy();
            if ($date->isSaturday() || $date->isSameDay($endOfYear)) {
                $weeks[] = $currentWeek;
                $currentWeek = [];
            }
        }

        return $weeks;

    }
}
