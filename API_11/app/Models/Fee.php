<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * This class is Fee model class with all fees management related functions and variables.
 *
 * @package Meritest_LMS_Fee_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/fees
 */
class Fee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'standard_id',
        'batch_id',
        'fee_type_id',
        'total_amount',
        'amount_to_pay',
        'balance',
        'created_by',
        'updated_by',
    ];

    /**
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    /**
     * @return BelongsTo
     */
    public function standard(): BelongsTo
    {
        return $this->belongsTo(Standard::class, 'standard_id');
    }

    /**
     * @return BelongsTo
     */
    public function batch(): BelongsTo
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    /**
     * @return BelongsTo
     */
    public function fee_type(): BelongsTo
    {
        return $this->belongsTo(FeeType::class, 'fee_type_id');
    }
}
