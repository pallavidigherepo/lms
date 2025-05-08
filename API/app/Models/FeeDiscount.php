<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This class is FeeDiscount model class with all fees management related functions and variables.
 *
 * @package Meritest_LMS_FeeDiscount_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/fee_discounts
 */
class FeeDiscount extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'amount',
        'created_by',
        'updated_by',
        'expiry_date',
    ];

    protected function getAvailableDiscountsForStudent() {

    }
}
