<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Leave extends Model
{
    protected $table = 'leave';
    protected $primaryKey = 'id'; // Set the correct primary key column

    // Define the relationship with the User model using 'id' as the foreign key
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
