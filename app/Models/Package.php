<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Transaction;
Use Auth;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'location',
        'price',
    ];

    public function getIsRegisteredAttribute()
    {
        if (!Auth::check()){
            return false;
        }

        return Transaction::wherePackageId($this->id)->whereUserId(Auth::id())->exists();
    }
}
