<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tasks';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'task',
        'description',
        'deadline',
        'status',
        'milestone_id',
        "updated_at",
        "deleted_at",
    ];


    public function milestone(){
        return $this->belongsTo(Milestone::class,'milestone_id');
    }
}
