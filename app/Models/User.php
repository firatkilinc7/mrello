<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table= "users";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        'fullname',
        'username',
        'email',
        'password',
        'img_url',
    ];

    public function getPano(){
        return $this->belongsToMany(PanoModel::class, "panometa", "user_id", "pano_id");
    }

}
