<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Following extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'followings';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'following',
        'follower',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function follower(){
        return $this->belongsTo(User::class,'follower');
    }

    public function following(){
        return $this->belongsTo(User::class,'following');
    }
}
