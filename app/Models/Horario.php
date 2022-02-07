<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 *
 * @property $id
 * @property $name
 * @property $inicio
 * @property $fin
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Horario extends Model
{
    
    static $rules = [
		'name' => 'required',
		'inicio' => 'required',
		'fin' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','inicio','fin'];



}
