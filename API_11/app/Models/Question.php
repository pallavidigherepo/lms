<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * This class is Question model class with all question management related functions and variables.
 *
 * @package Meritest_LMS_User_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/questions
 */
class Question extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string[]
     */
    protected $fillable = array(
                                'parent_id',
                                'question',
                                'description',
                                'marks',
                                'negative_marks',
                                'expected_time',
                                'board_id',
                                'standard_id',
                                'note',
                                'difficulty_level_id',
                                'add_question_manually',
                                'type_id',
                                'language_id',
                                'subject_id',
                                'chapter_id',
                                // 'topic_id',
                                'created_by',
                                'updated_by',
        );

    /**
     * @var string[]
     */
    protected $searchable = [
        'question',
    ];

    /**
     * @var string[]
     */
    protected $sortable = [
        'id',
        'question',
    ];

    /**
     * @return BelongsTo
     */
    public function languages(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * @return BelongsTo
     */
    public function question_type(): BelongsTo
    {
        return $this->belongsTo(QuestionType::class, 'type_id');
    }

    /**
     * @return BelongsTo
     */
    public function standard(): BelongsTo
    {
        return $this->belongsTo(Standard::class);
    }

    /**
     * @return BelongsTo
     */
    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }

    /**
     * @return BelongsTo
     */
    public function difficulty_level(): BelongsTo
    {
        return $this->belongsTo(QuestionDifficultyLevel::class);
    }

    /**
     * @return BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * @return BelongsTo
     */
    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }

    /**
     * @return BelongsTo
     */
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return BelongsTo
     */
    public function updator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * @param $query
     * @return void
     */
    public function scopeRoot($query) {
        $query->whereNull('parent_id');
    }

    /**
     * @return HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

}
