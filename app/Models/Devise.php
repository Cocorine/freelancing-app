<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devise extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'devise';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'devise',
        'name',
        'slug-name',
        "created_at",
        "updated_at",
        "deleted_at",
    ];
}
