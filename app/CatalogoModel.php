<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogoModel extends Model
{
    protected $fillable = ['nome','lagradouro','numero','bairro','cidade','estado','telefone','email','sexo','nascimento'];
    protected $guarded = ['id','created_at','update_at'];
    protected $table = 'contatos';

    //Search for contacts. 
    public function search(Array $data)
    {
        return $this->where(function ($query) use ($data) {
            if (isset($data['nome'])){
                $query->where('nome', $data['nome']);
            }
            if (isset($data['telefone'])){
                $query->where('telefone', $data['telefone']);
            }
            if (isset($data['email'])){
                $query->where('email', $data['email']);
            }
        })->paginate(6);
    }

    //Validate Email.
    public function validarEmail($email){
        return self::where('email', $email)->first();
    }
}
