<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'skills';
    protected $softDelete = true;

    protected $fillable = ['name', 'skillable_id', 'skillable_type'];

    // All fields inside $fillable array can be mass-assigned

    public function skillable(){
        return $this->morphTo();
    }
}
