<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name','photo'];

    public function companies(){
        return $this->hasMany(Company::class);
    }
}
