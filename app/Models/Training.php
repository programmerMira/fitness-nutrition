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
        'level',
        'training_price',
        'problem_zone_id',
        'info',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'training_location_id' => 'integer',
        'level' => 'integer',
        'training_price' => 'double',
        'problem_zone_id'=>'integer',
        'info'=>'array',
    ];

    protected $with = ["trainingLocation"];

    public function trainingLocation()
    {
        return $this->belongsTo(\App\Models\TrainingLocation::class,"training_location_id","id");
    }

    public function trainingDays()
    {
        return $this->hasMany(\App\Models\Days::class,"training_id","id");
    }

    public function problemZone()
    {
        return $this->belongsTo(\App\Models\ProblemZone::class);
    }

    public function trainingUser()
    {
        return $this->belongsTo(\App\Models\TrainingUser::class);
    }
}
