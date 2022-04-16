<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'educations';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'degree',
        'school',
        'description',
        'start-at',
        'end-at',
        'user_id',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function education_user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
