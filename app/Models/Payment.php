<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'payment_channel',
        'payee_id',
        'merchant_code',
        'amount',
        'tax_amount',
        'total_amount',
        'reference_code',
    ];

    //relationship with use
    public function user(){
        return $this->belongsTo(User::class, 'payee_id');
    }
}
