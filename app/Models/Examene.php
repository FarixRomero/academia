<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Examene
 *
 * @property $id
 * @property $sesione_id
 * @property $titulo
 * @property $descripcion
 * @property $is_active
 * @property $hora_inicio
 * @property $duracion
 * @property $hora_fin
 * @property $url
 * @property $url2
 * @property $created_at
 * @property $updated_at
 *
 * @property Sesione $sesione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Examene extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'descripcion' => 'required',
		'is_active' => 'required',
		'hora_inicio' => 'required',
		'duracion' => 'required',
		'hora_fin' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sesione_id','titulo','descripcion','is_active','hora_inicio','duracion','hora_fin','url','url2'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sesione()
    {
        return $this->hasOne('App\Models\Sesione', 'id', 'sesione_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'examene_users');
    }

}
