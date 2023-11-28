<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function sender()
    {
        return $this->belongsTo(User::class, 'transfer_user_id');
    }
    public function receiver()
    {
        return $this->belongsTo(User::class,'receiver_user_id');
    }
}
