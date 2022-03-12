<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    static $rules = [
		'name' => 'required',
		'email' => 'required',
		'tipo_usuario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','tipo_usuario','password'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursoUsers()
    {
        return $this->hasMany('App\Models\CursoUser', 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exameneUsers()
    {
        return $this->hasMany('App\Models\ExameneUser', 'user_id', 'id');
    }
    

}
