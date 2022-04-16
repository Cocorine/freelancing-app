<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
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
        'amount',
        'is_pay',
        'status',
        'milestone_id',
        'freelancer',
        'user_id',
        "created_at",
        "updated_at",
        "deleted_at",
    ];


    public function jober(){
        return $this->belongsTo(User::class,'freelancer');
    }

    public function jalon(){
        return $this->belongsTo(Milestone::class,'milestone_id');
    }

    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }
}
