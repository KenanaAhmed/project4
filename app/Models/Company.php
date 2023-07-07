<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name','location','description','balance','photo','status','user_id','city_id'];


    public function profile(){
        return $this->hasOne(CompanyProfile::class);
    }

    public function accounts(){
        return $this->hasMany(Account::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
