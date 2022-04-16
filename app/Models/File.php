<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'files';
    protected $softDelete = true;

    protected $fillable = ['name','url', 'fileable_id', 'fileable_type'];

    // All fields inside $fillable array can be mass-assigned

    public function fileable(){
        return $this->morphTo();
    }
}
