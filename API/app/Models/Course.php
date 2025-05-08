<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CoursesType;
use App\Models\Subject;
use Spatie\Tags\HasTags;
/**
 * This class is Course model class with all course management related functions and variables.
 *
 * @package Meritest_LMS_User_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/courses
 */
class Course extends Model
{
    use HasFactory;
    use HasTags;


    protected $guarded = [];

    protected $fillable = array('name', 'course_code', 'language_id', 'created_by', 'updated_by');

    protected $searchable = [
        'name',
        'course_code',
    ];

    protected $sortable = [
        'id',
        'name',
        'course_code',
    ];

    /**
     * The roles that belong to the user.
     */
    public function courses_types()
    {
        return $this->belongsToMany(CoursesType::class, 'course_type', 'course_id', 'type_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

}
