<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'proposals';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'price',
        'description',
        'delay',
        'hire',
        'freelancer',
        'project_id',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }

    public function proposer(){
        return $this->belongsTo(User::class,'freelancer');
    }
}
