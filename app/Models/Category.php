<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * HasMany relation between category and blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blog()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }
}
