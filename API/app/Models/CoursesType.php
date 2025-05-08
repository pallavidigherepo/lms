<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * This class is CoursesType model class with all courses type management related functions and variables.
 *
 * @package Meritest_LMS_User_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/courses_types
 */
class CoursesType extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
        'description',
        'icon',
    ];

    protected $searchable = [
        'label',
        'description',
    ];

    protected $sortable = [
        'id',
        'label',
        'description',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

}
