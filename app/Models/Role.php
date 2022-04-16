<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'roles';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'role',
        'slug-role',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function users(){
        return $this->belongsToMany(User::class,'role_users','role_id','user_id');
    }

    public function role_users(){
        return $this->hasMany(RoleUser::class,'role_id');
    }

    public static function search($query){

        return empty($query) ? []
            : static::where(function($q) use ($query) {
                    $q
                        ->where('role', 'LIKE', '%'. $query . '%')
                        ->orWhere('slug-role', 'LIKE', '%' . $query . '%');
                });
        }
}
