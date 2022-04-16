<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Pivot
{
    use SoftDeletes;

    protected $table = 'membership';
    protected $softDelete = true;

    protected $fillable = ['user_id', 'plan_id'];

    // All fields inside $fillable array can be mass-assigned


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }
}
