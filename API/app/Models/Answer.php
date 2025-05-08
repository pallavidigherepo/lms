<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
/**
 * This class is Answer model class with all question and answer management related functions and variables.
 *
 * @package Meritest_LMS_User_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/questions
 */
class Answer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = array('question_id', 'answer', 'is_correct', 'created_by', 'updated_by');

    /**
     * Get the post that owns the comment.
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'id');
    }
}
