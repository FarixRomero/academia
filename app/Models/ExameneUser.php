<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExameneUser
 *
 * @property $id
 * @property $examene_id
 * @property $user_id
 * @property $entrego_tarde
 * @property $nota
 * @property $comentario
 * @property $url
 * @property $created_at
 * @property $updated_at
 *
 * @property Examene $examene
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ExameneUser extends Model
{
    
    static $rules = [
		'entrego_tarde' => 'required',
		'comentario' => 'required',
		'url' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['examene_id','user_id','url_student','comentario_student','entrego_tarde','nota','comentario','url'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function examene()
    {
        return $this->hasOne('App\Models\Examene', 'id', 'examene_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
