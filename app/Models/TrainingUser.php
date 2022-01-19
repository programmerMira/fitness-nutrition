<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingUser extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'training_id',
        'training_location_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'training_id' => 'integer',
        'training_location_id' => 'integer',
    ];


    public function trainingLocation()
    {
        return $this->belongsTo(\App\Models\TrainingLocation::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\TrainingUser::class);
    }

    public function training()
    {
        return $this->belongsTo(\App\Models\Training::class);
    }
}
