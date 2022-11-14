<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function appsetting()
    {
        return $this->hasONe(AppSetting::class,'company_id');
    }
}
