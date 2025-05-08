<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSibling extends Model
{
    use HasFactory;

    protected $guarded;

    protected $fillable = [
        'sibling_ids',
        'student_id',
        'parent_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'student_ids' => 'array',
    ];
}
