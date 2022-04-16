<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'wallets';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'cvv',
        'account_number',
        'account_wallet',
        'card_type',
        'card_number',
        'expire_on',
        'first_name',
        'last_name',
        'user_id',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class,'wallet_id');
    }

}
