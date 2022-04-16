<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Langue extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'langues';
    protected $softDelete = true;

    protected $fillable = ['langue', 'level', 'user_id'];

    // All fields inside $fillable array can be mass-assigned


    public function user_langue(){
        return $this->belongsTo(User::class,'user_id');
    }
}
