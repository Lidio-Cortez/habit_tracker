<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HabitLog extends Model
{
    protected $fillable = [
        'user_id',
        'habit_id',
        'completed_at'
    ];
    public function user(): BelongsTo{
        return belogsTo(User::class);
    }
    public function habbit(): BelongsTo{
        return belongsTo(habit::class);
    }
}
