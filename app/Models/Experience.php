<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'experiences';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'compagny',
        'description',
        'start-at',
        'end-at',
        'user_id',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function experience_user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
