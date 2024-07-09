<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Child
 *
 * @property $id
 * @property $name
 * @property $middlename
 * @property $lastname
 * @property $birthdate
 * @property $parent_id
 * @property $photo
 * @property $gender
 * @property $height
 * @property $weight
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Child extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'middlename', 'lastname', 'birthdate', 'parent_id', 'photo', 'gender', 'height', 'weight', 'description'];


}
