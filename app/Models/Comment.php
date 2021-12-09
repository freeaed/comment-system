<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function replies($id){
        return Comment::where(['replay_id' => $id])->get();
    }
}
