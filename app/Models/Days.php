<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'training_id',
        'day_number',
        'name',
        'description',
        'videos',
        'info',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'training_id' => 'integer',
        'videos' => 'array',
        'info'=>'array',
    ];


    public function training()
    {
        return $this->belongsTo(\App\Models\Training::class);
    }
}
