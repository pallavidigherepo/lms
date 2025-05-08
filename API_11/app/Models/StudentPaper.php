<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * This class is Student Paper model class with all student and their paper management related functions and variables.
 *
 * @package Meritest_LMS_StudentPaper_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/students/:param="studentId"
 */
class StudentPaper extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'batch_id',
        'course_id',
        'generated_question_paper_id',
        'student_id',
        'subject_id',
        'attempted_on',
        'total_time',
        'total_time_taken',
        'total_marks',
        'total_marks_scored',
        'solved_questions',
        'created_by',
        'updated_by',
        'unique_code',
        'start_date',
        'end_date',
        'can_retest',
        'show_result_on'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'solved_questions' => 'array'
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function batch(): BelongsTo
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function generated_question_papers(): BelongsTo
    {
        return $this->belongsTo(GeneratedQuestionPaper::class, 'generated_question_paper_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_id');
    }
}
