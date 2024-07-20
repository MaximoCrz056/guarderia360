<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable = [
        'name', 'middlename', 'lastname', 'phone', 'photo',
    ];

    public function children()
    {
        return $this->hasMany(Children::class);
    }
}
