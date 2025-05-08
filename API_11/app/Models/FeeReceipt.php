<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * This class is FeeReceipt model class with all fees management related functions and variables.
 *
 * @package Meritest_LMS_FeeReceipt_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/fee_receipts
 */
class FeeReceipt extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fee_id',
        'fee_transaction_id',
        'parent_id',
        'created_by',
        'updated_by',
    ];
}
