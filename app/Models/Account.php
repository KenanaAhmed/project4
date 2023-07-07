<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable=
    ['user_id','company_id','code','photo','balance','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function subscriber(){
        return $this->belongsTo(Subscribe::class);
    }

    public function transfers(){

        return $this->hasMany(Transfer::class);
    }
    public function company(){
        return $this->beLongsTo(Company::class);
    }
}
