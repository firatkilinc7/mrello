<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListModel extends Model
{
    protected $table= "list";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "pano_id",
        "name",
        "slug",
    ];

    protected $guarded = [
        "id",
    ];

    public function parentPano(){
        return $this->belongsTo(PanoModel::class, "pano_id");
    }

    public function getTasks(){
        return $this->hasMany(TaskModel::class, "list_id");
    }
}
