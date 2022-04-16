<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'links';
    protected $softDelete = true;

    protected $fillable = ['name','url', 'linkable_id', 'linkable_type'];

    // All fields inside $fillable array can be mass-assigned

    public function linkable(){
        return $this->morphTo();
    }
}
