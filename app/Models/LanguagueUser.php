<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class LanguagueUser extends Pivot
{
    use SoftDeletes;

    protected $table = 'languague_users';
    protected $softDelete = true;

    protected $fillable = ['level','status','user_id', 'languague_id'];

    // All fields inside $fillable array can be mass-assigned


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function languague(){
        return $this->belongsTo(Languague::class);
    }
}
