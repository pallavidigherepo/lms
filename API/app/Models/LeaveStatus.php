<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function leaves()
    {
        return $this->hasMany(Leave::class, 'leave_statuses_id');
    }
}
