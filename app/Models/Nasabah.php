<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Nasabah extends Model
{
    use HasFactory, Notifiable,SoftDeletes;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function nasabahRFID(){
        return $this->hasMany(Nasabah::class,TempCard::class);
    }

    public function nasabahCanProcess(){
        return $this->hasMany(Nasabah::class,Processing::class);
    }

    public function processing()
    {
        return $this->hasManyThrough(User::class, Processing::class);
    }
}