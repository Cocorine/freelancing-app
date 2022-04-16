<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'countries';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'country',
        'slug-country',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function country_users(){
        return $this->hasMany(User::class);
    }

    public function country_projects(){
        return $this->hasMany(Project::class);
    }
}
