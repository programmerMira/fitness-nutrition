<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicsParameters extends Model
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
        'phase_number',
        'photoes',
        'weight',
        'height',
        'dream_weight',
        'current_weight',
        'hips_cm',
        'waist_cm',
        'chest_cm',
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
        'phase_number' => 'integer',
        'photoes' => 'array',
        'weight' => 'float',
        'height' => 'float',
        'dream_weight' => 'float',
        'hips_cm' => 'float',
        'waist_cm' => 'float',
        'chest_cm' => 'float',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\TrainingUser::class);
    }
}
