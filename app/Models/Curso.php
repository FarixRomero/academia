<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 *
 * @property $id
 * @property $name
 * @property $nivel
 * @property $code
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Curso extends Model
{
    
    static $rules = [
		'name' => 'required',
		'nivel' => 'required',
		'code' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','nivel','code','is_active'];

    public function users()
    {
        return $this->belongsToMany(User::class,'curso_users');
    }
    public function sesiones()
    {
        return $this->hasMany('App\Models\Sesione', 'curso_id', 'id');
    }
}
