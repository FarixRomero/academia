<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sesione
 *
 * @property $id
 * @property $curso_id
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
		'curso_id' => 'required',
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
    protected $fillable = ['curso_id','titulo','descripcion','is_active'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function cursoHorario()
    // {
    //     return $this->hasOne('App\Models\Curso', 'id', 'curso_id');
    // }
    public function curso()
    {
        return $this->hasOne('App\Models\Curso', 'id', 'curso_id');
    }
    public function files()
    {
        return $this->hasMany('App\Models\File', 'sesione_id', 'id');
    }
    public function examenes()
    {
        return $this->hasMany('App\Models\Examene', 'sesione_id', 'id');
    }
    

}
