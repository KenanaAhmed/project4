<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable=['company_id','information','photo','members','conditions','email'];

    public function company(){
        return $this->beLongsTo(Company::class);
    }

}
