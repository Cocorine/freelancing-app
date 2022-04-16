<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    protected $table = 'users';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nom',
        'prenom',
        'identity',
        'email',
        'gender',
        'profil_description',
        'experience',
        'pseudo',
        'compagny',
        'price_type',
        'profil',
        'telephone',
        'hire_price',
        'ratings',
        'plan_id',
        'active',
        'address',
        'state',
        'zipcode',
        'verified',
        'wallet_id',
        'country_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'role_users','user_id','role_id');
    }

    public function user_roles(){
        return $this->hasMany(RoleUser::class,'user_id');
    }

    public function isAdministrator(){
        return $this->roles()->where('role', 'Administrator')->exists();
       // return $this->roles()->where('role_id',1)->first() ? true : false;
    }

    public function isCompagny(){
        return $this->roles()->where('role', 'Compagny')->exists();
       //return count($roles) >0 ? true : false;
    }

    public function isFreelancer(){
        return $this->roles()->where('role', 'Freelancer')->exists();
      //  return $this->roles()->where('role_id',3)->first() ? true : false;
    }

    public function feedbacks(){
        return $this->hasMany(FeedBack::class,'freelancer_id');
    }

    public function commentateur(){
        return $this->hasMany(FeedBack::class,'user_id');
    }

    public function wallet(){
        return $this->hasOne(Wallet::class,'user_id');
    }

    public function location(){
        return $this->belongsTo(Country::class,'country_id');
    }

    public function membership(){
        return $this->belongsTo(Plan::class,'plan_id');
    }

    public function languagues(){
        return $this->belongsToMany(Languague::class,'languague_users','user_id','languague_id');
    }

    public function user_languagues(){
        return $this->hasMany(LanguagueUser::class,'user_id');
    }

    public function user_educations(){
        return $this->hasMany(Education::class,'user_id');
    }

    public function user_certificates(){
        return $this->hasMany(Certificate::class,'user_id');
    }

    public function user_langues(){
        return $this->hasMany(Langue::class,'user_id');
    }

    public function user_experiences(){
        return $this->hasMany(Experience::class,'user_id');
    }

    public function skills(){
        return $this->morphMany(Skill::class,'skillable');
    }

    public function personal_link(){
        return $this->morphOne(Link::class,'linkable')->where('name','personal_link');
    }

    public function fb_link(){
        return $this->morphOne(Link::class,'linkable')->where('name','fb_link');
    }

    public function tw_link(){
        return $this->morphOne(Link::class,'linkable')->where('name','tw_link');
    }

    public function linkedin_link(){
        return $this->morphOne(Link::class,'linkable')->where('name','linkedin_link');
    }

    public function be_link(){
        return $this->morphOne(Link::class,'linkable')->where('name','be_link');
    }

    public function dribble_link(){
        return $this->morphOne(Link::class,'linkable')->where('name','dribble_link');
    }


    public function social_links(){
        return $this->morphMany(Link::class,'linkable');
    }

    public function profile(){
        return $this->morphOne(File::class, 'fileable')->where('url','like', '%users_profils/%');
    }

    public function user_proposals(){
        return $this->hasMany(Proposal::class,'freelancer');
    }

    public function myProjects(){
        return $this->hasMany(Project::class,'owner');
    }

    public function allProjects(){
        return $this->hasMany(Project::class)->where('owner',auth()->id());//->orWhere('freelancer',auth()->id());
    }

    public function projects(){
        return $this->belongsToMany(Project::class,'project_users','user_id','project_id');
    }

    public function user_projects(){
        return $this->hasMany(ProjectUser::class,'user_id');
    }

    public function followers(){
        return $this->hasMany(Following::class,'follower');
    }

    public function followings(){
        return $this->hasMany(Following::class,'following');
    }



    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function groupes(){
        return $this->belongsToMany(Groupe::class,'groupe_users','user_id','groupe_id')->withPivot('id','in_groupe','is_read','is_admin','user_id','groupe_id')->orderByDesc('created_at');
    }

    public function conversations(){
        return $this->groupes()->with('illustration','funder','last_message');//->with('illustration','funder','last_message')->latest();
    }

    public function direct_conversations(){
        return $this->conversations()->where('type','pair');
    }

    public function user_groupes(){
        return $this->hasMany(GroupeUsers::class);
    }

}
