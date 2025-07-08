<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**
 * This class is ProfileUser model class with all users profile management related functions and variables.
 *
 * @package Meritest_LMS_User_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/profile
 */
class ProfileUser extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'alt_email',
        'mobile',
        'alt_mobile',
        'address',
        'alt_address',
        'gender',
        'qualification',
        'avatar',
        'designation',
        'date_of_joining',
        'dob',
    ];

    protected $searchable = [
        'id',
        'alt_email',
        'mobile',
        'alt_mobile',
        'address',
        'alt_address',
        'gender',
        'qualification',
        'avatar',
        'designation',
        'date_of_joining',
    ];

    protected $sortable = [
        'alt_email',
        'gender',
        'designation',
    ];


    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
