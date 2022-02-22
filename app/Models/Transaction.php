<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Auth;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'package_id',
        'period_month',
        // 'is_paid',
        'payment_status',
        'midtrans_url',
        'midtrans_booking_code'
    ];

    public function setPeriodMonthAttribute($value)
    {
        $this->attributes['period_month'] = date('Y-m-t H:i:s', strtotime($value));
    }

    public function Package(): BelongsTo
    {
        return $this->BelongsTo(Package::class);
    }

    public function User(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
