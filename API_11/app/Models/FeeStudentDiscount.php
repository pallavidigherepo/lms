<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class FeeStudentDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'fee_id',
        'fee_discount_id'
    ];



    protected function getAvailableDiscountsForStudent($studentId): array
    {
        $fee = Fee::where('student_id', $studentId)->first();
        $discounts = [];
        // First get list of all the discount offers available who are not expired.
        $now = Carbon::now();
        $discounts = FeeDiscount::where('expiry_date', '>', $now->toDateString())
            ->orWhere('expiry_date', '=', null)
            ->get();
        $studentDiscount = [];
        foreach ($discounts as $discount) {

            if ($discount->name === "One Time Payment") {
                $studentDiscount[$discount->id . ":". $discount->name] = $discount->amount;
            }
            if ($discount->name === "Siblings") {
                // Check if student have siblings
                $siblings = StudentSibling::where('student_id', $studentId)->where('sibling_ids', '!=', null)->get();
                if ($siblings) {
                    // Get sibling discount
                    $studentDiscount[$discount->id . ":". $discount->name] = $discount->amount;
                }
            }
            if ($fee->fee_type_id === 5) {
                if ($discount->name === "Staff Ward") {
                    $studentDiscount[$discount->id . ":". $discount->name] = $discount->amount;
                }
            }
        }
        $studentDiscount['total_discounts'] = array_sum(array_values($studentDiscount));
        return $studentDiscount;
    }
}
