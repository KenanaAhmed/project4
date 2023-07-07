<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;

    protected $fillable=['user_id','company_id','email','status','photo'];

    public function user(){
        return $this->beLongsTo(User::class);
    }
    public function account(){
        return $this->hasOne(Account::class);
    }
}
