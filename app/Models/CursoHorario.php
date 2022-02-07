<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CursoHorario
 *
 * @property $id
 * @property $curso_id
 * @property $horario_id
 * @property $name
 * @property $is_active
 * @property $created_at
 * @property $updated_at
 *
 * @property Curso $curso
 * @property Horario $horario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CursoHorario extends Model
{
    
    static $rules = [
		'curso_id' => 'required',
		'horario_id' => 'required',
		'name' => 'required',
		'is_active' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['curso_id','horario_id','name','is_active'];


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
    public function horario()
    {
        return $this->hasOne('App\Models\Horario', 'id', 'horario_id');
    }
    

}
