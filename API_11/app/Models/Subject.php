<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;
use App\Models\Course;
/**
 * This class is Subject model class with all subject management related functions and variables.
 *
 * @package Meritest_LMS_Subject_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/subjects
 */
class Subject extends Model
{
    use HasFactory;
    use HasTags;

    protected $guarded = [];

    protected $fillable = array(
        'label',
        'description',
        'icon',
        'language_id',
        'parent_id',
        'board_id',
        'standard_id',
        'created_by',
        'updated_by'
    );

    protected $searchable = [
        'label',
        'icon',
    ];

    protected $sortable = [
        'id',
        'label',
    ];

    /**
     * The roles that belong to the user.
     */
    public function courses_subjects()
    {
        return $this->belongsToMany(Course::class, 'course_subject', 'subject_id', 'course_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'parent_id');
    }

    public function board()
    {
        return $this->belongsTo(Board::class, 'board_id');
    }

    public function standard()
    {
        return $this->belongsTo(Standard::class, 'standard_id');
    }
}
