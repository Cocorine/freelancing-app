<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeedBack extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'feedbacks';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'feedback',
        'user_id',
        'freelancer_id',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function to_freelancer(){
        return $this->belongsTo(User::class,'freelancer_id');
    }

    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }
}
