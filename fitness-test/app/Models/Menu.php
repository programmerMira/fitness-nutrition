<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_type_id',
        'menu_calories_id',
        'menu_content',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'menu_type_id' => 'integer',
        'menu_calories_id' => 'integer',
        'menu_content' => 'array',
    ];


    public function menuType()
    {
        return $this->belongsTo(\App\Models\MenuType::class);
    }

    public function menuCalories()
    {
        return $this->belongsTo(\App\Models\MenuCalory::class);
    }
}
