<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actor extends Model
{
    use HasFactory;

    protected $casts = [
        'birthday' => 'date',
    ];

    /**
     * Pour faire Movie::create(...), ATTENTION PAS DE $request->all()
     */
    protected $guarded = [];

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }

    public function getAge()
    {
        $date = Carbon::now();

        return $date->format('Y');
    }
}
