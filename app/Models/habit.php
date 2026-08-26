<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

class habit extends Model
{
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
}
