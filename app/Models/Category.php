<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'category',
        'slug-category',
        "created_at",
        "updated_at",
        "deleted_at",
    ];


    public function category_projects(){
        return $this->hasMany(Project::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('category','like', '%'.Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$search))).'%');
    }
}
