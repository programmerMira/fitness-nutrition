<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCalendar extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_menus_id',
        'day',
        'is_active'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'users_menus_id' => 'integer',
        'day' => 'integer',
    ];


    public function usersMenus()
    {
        return $this->belongsTo(\App\Models\UserMenu::class);
    }
}
