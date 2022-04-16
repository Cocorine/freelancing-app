<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'projects';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'price_type',
        'description',
        'start_at',
        'hire_at',
        'duree',
        'delay',
        'min_price',
        'max_price',
        'status',
        'owner',
        'country_id',
        'category_id',
        'freelancer',
        'job_type',
        'experience',
        'level',
        'skill_type',
        'qualifications',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    protected $dates = ['delay','start_at'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function location(){
        return $this->belongsTo(Country::class,'country_id');
    }

    public function project_owner(){
        return $this->belongsTo(User::class,'owner');
    }

    public function skills(){
        return $this->morphMany(Skill::class,'skillable');
    }

    public function links(){
        return $this->morphMany(Link::class,'linkable');
    }

    public function cahiers(){
        return $this->morphMany(File::class, 'fileable');//->where('url','like', '%user_profil/%');
    }

    public function milestones(){
        return $this->hasMany(Milestone::class,'project_id');
    }

    public function project_hire_proposal(){
        return $this->hasMany(Proposal::class,'project_id')->where('hire',true)->first();
    }

    public function project_proposals(){
        return $this->hasMany(Proposal::class,'project_id');
    }

    public function users(){
        return $this->belongsToMany(Project::class,'project_users','project_id','user_id');
    }

    public function project_freelancers(){
        return $this->hasMany(ProjectUser::class,'project_id');
    }
}
