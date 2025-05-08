<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'leave_type_id',
        'from',
        'to',
        'description',
        'leave_statuses_id',
    ];


    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }

    public function leaveStatus()
    {
        return $this->belongsTo(LeaveStatus::class, 'leave_statuses_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
