<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'training_location_id',
        'name',
        'description',
        'training_days',
        'level',
        'training_price',
        'problem_zone_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'training_location_id' => 'integer',
        'training_days' => 'array',
        'level' => 'integer',
        'training_price' => 'double',
        'problem_zone_id'=>'integer',
    ];


    public function trainingLocation()
    {
        return $this->belongsTo(\App\Models\TrainingLocation::class);
    }

    public function problemZone()
    {
        return $this->belongsTo(\App\Models\ProblemZone::class);
    }
}
