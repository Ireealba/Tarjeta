<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_tarjeta','name', 'last_name', 'description','empresa',
        'puesto_trabajo', 'tlf1', 'tlf2', 'tlf3', 'email1', 'email2',
        'email3', 'location', 'cod_postal', 'local', 'nacional',
        'social1', 'social2', 'social3', 'website1', 'website2', 'website3', 'user_id'
    ];
    public function rules(){
        $rules = [
            'name_tarjeta' => "required|unique:tarjetas",
            'name' => 'required',
            'last_name' => 'required',
            'tlf1' => 'required',
            'email1' => 'required|email',
            'email2' => 'nullable|email',
            'email3' => 'nullable|email',
            'file' => 'nullable|image'
        ];
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function image(){
        return $this->hasOne('App\Models\Image');
    }

}
