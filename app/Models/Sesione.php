<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sesione
 *
 * @property $id
 * @property $curso_horario_id
 * @property $titulo
 * @property $descripcion
 * @property $is_active
 * @property $created_at
 * @property $updated_at
 *
 * @property CursoHorario $cursoHorario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sesione extends Model
{
    
    static $rules = [
		'curso_horario_id' => 'required',
		'titulo' => 'required',
		'descripcion' => 'required',
		'is_active' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['curso_horario_id','titulo','descripcion','is_active'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cursoHorario()
    {
        return $this->hasOne('App\Models\CursoHorario', 'id', 'curso_horario_id');
    }
    public function files()
    {
        return $this->hasMany('App\Models\File', 'sesione_id', 'id');
    }
    

}
