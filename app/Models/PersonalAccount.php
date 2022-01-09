<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccount extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'age',
        'life_style_id',
        'problem_zone_id',
        'training_location_id',
        'menu_calories_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'life_style_id' => 'integer',
        'problem_zone_id' => 'integer',
        'training_location_id' => 'integer',
        'menu_calories_id' => 'integer',
        'deactivated_at' => 'timestamp',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function lifeStyle()
    {
        return $this->belongsTo(\App\Models\LifeStyle::class);
    }

    public function problemZone()
    {
        return $this->belongsTo(\App\Models\ProblemZone::class);
    }

    public function trainingLocation()
    {
        return $this->belongsTo(\App\Models\TrainingLocation::class);
    }

    public function menuCalories()
    {
        return $this->belongsTo(\App\Models\MenuCalory::class);
    }
}
