<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inquiry_id',
        'comment',
        'parent_id',
        'inquiry_followup_id',
        'inquiry_status_id',
        'inquiry_followup_type_id',
        'created_by',
        'updated_by',
    ];
}
