<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Documento;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'primeiroNome', 'email', 'password', 'ultimoNome',
        'foto', 'cargo_id', 'funcao_id', 'agencia_id', 
        'dataNascimento','matricula', 'dataAdmissao', 
        'endereco', 'numero', 'complemento', 'bairro', 'CEP', 'municipio_id', 
        'telefone', 'celular', 'ativo', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function documento()
    {
        return $this->hasMany(Documento::class);
    }



}
