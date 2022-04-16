<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transactions';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'transaction_number',
        'status',
        'amount',
        'due_date',
        'name',
        'wallet_id',
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function wallet(){
        return $this->belongsTo(Wallet::class,'wallet_id');
    }
}
