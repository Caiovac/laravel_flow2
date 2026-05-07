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
    /**
     * Genera una griglia settimanale per un dato anno, con ogni settimana che inizia di domenica e termina di sabato.
     * I giorni che non appartengono all'anno specificato sono rappresentati come null.
     *
     * @param int $year L'anno per cui generare la griglia
     * @return array Una matrice di settimane, dove ogni settimana è un array di 7 elementi (date o null)
     */

    public static function generateYearGrid(int $year): array
{
    $startDate = Carbon::create($year, 1, 1)->startOfDay();
    $endDate = Carbon::create($year, 12, 31)->startOfDay();

    $weeks = [];
    $currentWeek = [];

    $firstDayOfWeek = $startDate->dayOfWeek; // 0 = domenica, 6 = sabato

    // Aggiunge celle vuote prima del primo giorno dell'anno
    for ($i = 0; $i < $firstDayOfWeek; $i++) {
        $currentWeek[] = null;
    }

    // Aggiunge tutti i giorni dell'anno
    for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
        $currentWeek[] = $date->copy();

        if ($date->isSaturday()) {
            $weeks[] = $currentWeek;
            $currentWeek = [];
        }
    }

    // Se l'ultima settimana non è completa, aggiunge celle vuote finali
    if (!empty($currentWeek)) {
        while (count($currentWeek) < 7) {
            $currentWeek[] = null;
        }

        $weeks[] = $currentWeek;
    }

    return $weeks;
}

    public function wasCompletedToday() : bool
    {
        return $this->habitLogs
                    ->where('completed_at', Carbon::today()->toDateString())
                    ->isNotEmpty();
    }
    public function wasCompletedOn(Carbon $date) : bool
    {
        return $this->habitLogs
                    ->where('completed_at', $date->toDateString())
                    ->isNotEmpty();
    }   

}