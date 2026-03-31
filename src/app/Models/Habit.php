<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\HabitLogs;
use Carbon\Carbon;

class Habit extends Model
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function habitLogs() : HasMany
    {
        return $this->hasMany(HabitLogs::class);
    }

    public function wasCompletedToday() : bool
    {
        return $this->habitLogs
                    ->where ('completed_at', Carbon::today()->toDateString())
                    ->isNotEmpty();
    }
}
