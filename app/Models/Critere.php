<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Critere extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'criteres';
    protected $softDelete = true;

    protected $fillable = ['critere', 'critereable_id', 'critereable_type'];

    // All fields inside $fillable array can be mass-assigned

    public function linkable(){
        return $this->morphTo();
    }
}
