<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'plans';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'plan',
        'description',
        'price',
        'periode',
        'role',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function pack_users(){
        return $this->hasMany(User::class);
    }

    public function criteres(){
        return $this->morphMany(Critere::class,'critereable');
    }
}
