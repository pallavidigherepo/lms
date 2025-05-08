<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * This class is FeeTransaction model class with all fees management related functions and variables.
 *
 * @package Meritest_LMS_FeeTransaction_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/fee_transactions
 */
class FeeTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fee_id',
        'fee_structure_id',
        'parent_id',
        'amount',
        'payment_method',
        'uid',
        'created_by',
        'updated_by',
    ];

    /**
     * @return BelongsTo
     */
    public function fee(): BelongsTo
    {
        return $this->belongsTo(Fee::class, 'fee_id');
    }

    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(StudentParent::class, 'parent_id');
    }
    /**
     * The "boot" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($transaction)
        {
            // First of all find parent_id from fee_id
            $fee = Fee::findOrFail($transaction->fee_id);
            $student = Student::findOrFail($fee->student_id);
            $transaction->parent_id = $student->parent_id;
            $transaction->created_by = Auth::user()->id;
            $transaction->updated_by = Auth::user()->id;
        });

        static::saving(function ($transaction) {
            // We need to get list of all the discounts available for the student.
            $fee = Fee::findOrFail($transaction->fee_id);
            $student = Student::findOrFail($fee->student_id);

            $studentDiscounts = FeeStudentDiscount::getAvailableDiscountsForStudent($student->id);

            $balance = $fee->balance - $transaction->amount;
            if ($balance === $studentDiscounts['total_discounts']) {
                // First get list of all the discount offers available who are not expired.
                foreach ($studentDiscounts as $studentDiscountKey => $studentDiscountValue) {

                    if ($studentDiscountKey !== 'total_discounts') {

                        $exploded = explode(":", $studentDiscountKey);
                        FeeStudentDiscount::create([
                            'fee_id' => $transaction->fee_id,
                            'fee_discount_id' => $exploded[0],
                        ]);
                    }
                }
                $balance = 0;
            }

            $fee->balance = $balance;
            $fee->updated_by = Auth::user()->id;
            $fee->save();

            // Now we have to create receipt
            FeeReceipt::create([
                'fee_id' => $transaction->fee_id,
                'fee_transaction_id' => $transaction->id,
                'parent_id' => $transaction->parent_id,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ]);
        });
    }
}
