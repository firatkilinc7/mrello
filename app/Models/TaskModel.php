<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{

    protected $table= "task";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "list_id",
        "title",
        "content",
        "slug",
    ];

    protected $guarded = [
        "id",
    ];

    public function parentList(){
        return $this->belongsTo(ListModel::class, "list_id");
    }
}
