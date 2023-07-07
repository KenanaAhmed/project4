<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageResponse extends Model
{
    use HasFactory;

    protected $fillable=['transfer_id','user1','user2','massege'];
}
