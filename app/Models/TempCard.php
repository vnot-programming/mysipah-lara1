<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempCard extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function nasabah(){
    //     return $this->hasOne(Nasabah::class,'nokartu');
    // }
}
