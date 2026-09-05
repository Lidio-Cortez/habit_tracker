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
}
