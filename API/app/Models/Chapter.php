<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;
use App\Models\Subject;
//use Spatie\Sluggable\HasSlug;
//use Spatie\Sluggable\SlugOptions;
/**
 * This class is Chapter model class with all chapter management related functions and variables.
 *
 * @package Meritest_LMS_User_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/subjects
 */
class Chapter extends Model
{
    use HasFactory;
    use HasTags;
    //use HasSlug;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subjects';

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
     * Get the post that owns the comment.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'parent_id')->where('parent_id', null);
    }

    /**
     * Get the post that owns the comment.
     */
    public function topics()
    {
        return $this->hasMany(Topic::class, 'parent_id')->where('parent_id', '!=',  null);
        //return $this->belongsTo(Subject::class, 'parent_id');
    }
}
