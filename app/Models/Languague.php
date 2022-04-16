<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Languague extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'languagues';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'code',
        'languague',
        'slug-languague',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function users(){
        return $this->belongsToMany(User::class,'languague_users','languague_id','user_id');
    }

    public function languague_users(){
        return $this->hasMany(LanguagueUser::class,'languague_id');
    }
}
