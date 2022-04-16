<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Milestone extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'milestones';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'milestone',
        'description',
        'start_at',
        "end_at",
        "progress",
        "budget",
        'status',
        'is_pay',
        'project_id',
        "updated_at",
        "deleted_at",
    ];


    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }

    public function tasks(){
        return $this->hasMany(Task::class,'milestone_id');
    }
}
