<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'date',
        'cash_sales',
        'credit_card_sales',
        'ewallet_sales',
        'total_sales',
        'user_id',
    ];
}

