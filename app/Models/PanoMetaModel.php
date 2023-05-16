<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanoMetaModel extends Model
{
    protected $table= "panometa";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "pano_id",
        "user_id",
    ];

    protected $guarded = [
        "id",
    ];
}
