<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CursoUser
 *
 * @property $id
 * @property $curso_id
 * @property $user_id
 * @property $fecha_inicio
 * @property $is_active
 * @property $created_at
 * @property $updated_at
 *
 * @property Curso $curso
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CursoUser extends Model
{
    
    static $rules = [
		'fecha_inicio' => 'required',
		'is_active' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['curso_id','user_id','fecha_inicio','is_active'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function curso()
    {
        return $this->hasOne('App\Models\Curso', 'id', 'curso_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
