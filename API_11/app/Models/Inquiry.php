<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Inquiry extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unique_code',
        'standard_id',
        'batch_id',
        'course_id',
        'inquiry_status_id',
        'inquiry_source_id',
        'inquiry_closing_reason',
        'student_name',
        'student_gender',
        'student_dob',
        'inquiry_date',
        'assigned_to',
        'contact_name',
        'contact_email',
        'contact_mobile',
        'reminder_count',
        'enquired_through',
        'created_by',
        'updated_by',
        'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'unique_code',
    ];


    /**
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
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
    public function source(): BelongsTo
    {
        return $this->belongsTo(InquirySource::class, 'inquiry_source_id');
    }

    /**
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(InquiryStatus::class, 'inquiry_status_id');
    }

    /**
     * @return BelongsTo
     */
    public function assigned(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * @return BelongsTo
     */
    public function followup_type(): BelongsTo
    {
        return $this->belongsTo(InquiryFollowupType::class, 'inquiry_followup_type_id');
    }

    /**
     * The "boot" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($inquiry) {
            $inquiry->unique_code = generate_unique_code_inquiry();
            $inquiry->created_by = Auth::user()->id;
            $inquiry->updated_by = Auth::user()->id;
            $inquiry->inquiry_date = Carbon::today();
        });

        static::created(function ($inquiry) {
            (new Inquiry)->saveStudent($inquiry);
        });

        static::updating(function ($inquiry) {
            $inquiry->updated_by = Auth::user()->id;
            (new Inquiry)->saveStudent($inquiry);
        });
    }

    protected function saveStudent($inquiry) {
        // Firstly: Check if inquiry is "Accepted" then we have to save student information in students table
        // and student_parents table.
        // With this we also need to add a row in pivot table with inquiry_id and created student_id
        if ($inquiry->inquiry_status_id === 4 || $inquiry->inquiry_status_id === "4") {
            // Now we need to set then array for students and student_parents table fields.
            $studentInput = [
                'name' => $inquiry->student_name,
                'batch_id' => $inquiry->batch_id,
                'standard_id' => $inquiry->standard_id,
                'board_id' => 1,
                'language_id' => 1,
                'email' => $inquiry->contact_email,
                'gender' => $inquiry->student_gender,
                'dob' => $inquiry->student_dob,
                'address' => $inquiry->address,
                'parent_email' => $inquiry->contact_email,
                'father_email' => $inquiry->contact_email,
                'father_mobile' => $inquiry->contact_mobile,
            ];
            $student = Student::create($studentInput);
            InquiryStudent::create([
                'inquiry_id' => $inquiry->id,
                'student_id' => $student->id,
            ]);
        }
    }
}

