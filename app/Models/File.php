<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 *
 * @property $id
 * @property $sesione_id
 * @property $tipo_file
 * @property $orden
 * @property $titulo
 * @property $descripcion
 * @property $url
 * @property $created_at
 * @property $updated_at
 *
 * @property Sesione $sesione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class File extends Model
{
    
    static $rules = [
		'sesione_id' => 'required',
		'tipo_file' => 'required',
		'titulo' => 'required',
		'descripcion' => 'required',
		'url' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sesione_id','tipo_file','orden','titulo','descripcion','url'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sesione()
    {
        return $this->hasOne('App\Models\Sesione', 'id', 'sesione_id');
    }
    

}
