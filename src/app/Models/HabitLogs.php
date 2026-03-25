<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Habit;


class HabitLogs extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'habit_id',
        'completed_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function habit(): BelongsTo
    {
        return $this->belongsTo(Habit::class);
    }
}
