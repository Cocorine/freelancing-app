<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'certificates';
    protected $softDelete = true;

    protected $fillable = ['certificate', 'date', 'user_id'];

    // All fields inside $fillable array can be mass-assigned


    public function certificate_user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function profile(){
        return $this->morphOne(File::class, 'fileable')->where('url','like', '%certificate/%');
    }

}
