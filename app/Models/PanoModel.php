<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanoModel extends Model
{
    protected $table= "pano";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "title",
        "slug",
    ];

    protected $guarded = [
        "id",
    ];

    public function userAccess(){
        return $this->belongsToMany(User::class, "panometa" , "pano_id", "user_id");
    }

    public function getList(){
        return $this->hasMany(ListModel::class, "pano_id");
    }

}
