<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrowdControlData extends Model
{
    use HasFactory;

    protected $fillable = ['entered', 'exited', 'current_inside', 'timestamp', 'user_id'];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}


}


