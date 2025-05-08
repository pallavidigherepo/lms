<?php

namespace App\Models;

use App\Http\Resources\StudentResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use function Illuminate\Events\queueable;


/**
 * This class is Student model class with all student management related functions and variables.
 *
 * @package Meritest_LMS_Student_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/students
 */
class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id',
        // 'email',
        'password',
        'enrollment_number',
        'transfer_number',
        'aadhaar',
        'board_id',
        'standard_id',
        'language_id',
        'batch_id',
        'course_id',
        'fee_type_id',
        // 'mobile',
        // 'alt_mobile',
        'gender',
        // 'avatar',
        'admission_date',
        'dob',
        'permanent_address',
        'address',
        'parent_aadhaar_number',
        'mother_name',
        'mother_email',
        'mother_mobile',
        'mother_qualification',
        'mother_occupation',
        'father_name',
        'father_email',
        'father_mobile',
        'father_qualification',
        'father_occupation',
        'parent_email',
        'parent_password',
        'document_type_ids',
        'document_type_storage',
        'blood_group',
        'medical_notes',
        'category',
        'caste',
        'religion',
        'mother_tongue_language',
        'interests',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'parent_password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //'dob' => 'datetime',
    ];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    protected $searchable = [
        'name',
        'email',
        'aadhaar',
        'mobile',
        'alt_mobile',
        'dob',
    ];

    /**
     * The attributes that are sortable.
     *
     * @var array
     */
    protected $sortable = [
        'name',
        'email',
    ];

    protected static $student_fee_type_id = "";

    protected static $document_type_ids = [];

    protected static $document_storage = [];

    protected static $selected_student_id = "";

    /**
     * @return BelongsTo
     */
    public function student_parent(): BelongsTo
    {
        return $this->belongsTo(StudentParent::class, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function student_siblings(): HasMany
    {
        return $this->hasMany(StudentSibling::class);
    }

    /**
     * @return BelongsTo
     */
    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class, 'board_id');
    }

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
     * @return HasOne
     */
    public function fee(): HasOne
    {
        return $this->hasOne(Fee::class, 'student_id');
    }

    /**
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    /**
     * @return HasMany
     */
    public function generated_question_papers() :HasMany
    {
        return $this->hasMany(GeneratedQuestionPaper::class);
    }

    /**
     * @return HasMany
     */
    public function student_papers() :HasMany
    {
        return $this->hasMany(StudentPaper::class);
    }

    /**
     * @return HasMany
     */
    public function student_documents() :HasMany
    {
        return $this->hasMany(StudentDocument::class, 'student_id')
                    ->with('document_type')
                    ->where('student_id', $this->id);
    }

    /**
     * The "boot" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($student)
        {
            static::$student_fee_type_id = $student->fee_type_id;
            static::$document_type_ids = $student->document_type_ids;
            static::$document_storage = $student->document_type_storage;

            $batch = Batch::where('is_active', 1)->first();

            $student['batch_id'] = $batch->id;
            $student['board_id'] = 1;

            //First we need to check if parent information is already available?
            //If yes use that selected parent_id
            $studentParent = StudentParent::firstOrCreate(
                ['parent_aadhaar_number' => $student['parent_aadhaar_number']],
                [
                    'parent_email' => $student['father_email'],
                    'parent_password' => Hash::make(123456789),
                    'parent_aadhaar_number' => $student['parent_aadhaar_number'] ?? null,
                    'mother_name' => $student['mother_name'] ?? null,
                    'mother_email' => $student['mother_email'] ?? null,
                    'mother_mobile' => $student['mother_mobile'] ?? null,
                    'mother_qualification' => $student['mother_qualification'] ?? null,
                    'mother_occupation' => $student['mother_occupation'] ?? null,
                    'father_name' => $student['father_name'] ?? null,
                    'father_email' => $student['father_email'] ?? null,
                    'father_mobile' => $student['father_mobile'] ?? null,
                    'father_qualification' => $student['father_qualification'] ?? null,
                    'father_occupation' => $student['father_occupation'] ?? null,
                ]
            );
            unset($student['parent_aadhaar_number']);
            unset($student['mother_name']);
            unset($student['mother_mobile']);
            unset($student['mother_email']);
            unset($student['mother_qualification']);
            unset($student['mother_occupation']);
            unset($student['father_name']);
            unset($student['father_email']);
            unset($student['father_mobile']);
            unset($student['father_qualification']);
            unset($student['father_occupation']);
            unset($student['parent_email']);
            unset($student['parent_password']);
            unset($student['fee_type_id']);
            unset($student['document_type_ids']);
            unset($student['document_type_storage']);

            $student['parent_id'] = $studentParent->id;
            $student['password'] = Hash::make(123456789);
            // We need to generate enrollment number

            // Check if image was given and save on local file system
            if (!empty($student['avatar'])) {
                $student['avatar']  = save_image($student['avatar'], 'students');
            }
            $student['created_by'] = Auth::user()->id;
            $student['updated_by'] = Auth::user()->id;
        });

        static::created(function ($student)
        {
            $newSiblingCreated = StudentSibling::create([
                'student_id' => $student->id,
                'sibling_ids' => null,
                'parent_id' => $student->parent_id,
            ]);

            // Now we need to check if this parent_id is available in students table to manage siblings.
            $siblings = StudentSibling::all()->where('parent_id', $student->parent_id);
            // If there are any older record is already available in student_siblings table, we need to update all the
            // records with new student_id
            if (count($siblings) > 1) {
                // Get ids as plain array of existing students in siblings table
                $newIds = Arr::pluck($siblings, 'student_id');

                foreach ($siblings as $sibling) {
                    $sibling->sibling_ids = array_diff($newIds, array($sibling->student_id));
                    $sibling->save();
                }
            }
            // Now we have to save all the documents uploaded by student.
            if (!empty(static::$document_type_ids)) {
                foreach (static::$document_type_ids as $documentId) {

                    StudentDocument::create([
                        'student_id' => $student->id,
                        'document_type_id' => $documentId,
                        'url' => save_image(static::$document_storage[$documentId], 'student_documents'),
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                    ]);
                }
            }

            // Now: according to the fee type of student we need to calculate the fees of student and make entry
            // in fees table with all calculated values.

            // For that, we need to find sum of amount of all the fee structures of selected batch, standard and fee type
            $conditions = [
                ['standard_id', '=', $student->standard_id],
                ['batch_id', '=', $student->batch_id],
                ['fee_type_id', '=', static::$student_fee_type_id],
            ];
            $feeStructures = FeeStructure::where($conditions)->sum('amount');

            Fee::create([
                'student_id' => $student->id,
                'standard_id' => $student->standard_id,
                'batch_id' => $student->batch_id,
                'fee_type_id' => static::$student_fee_type_id,
                'total_amount' => $feeStructures,
                'amount_to_pay' => $feeStructures,
                'balance' => $feeStructures,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ]);
        });

        static::updating(function($student)
        {
            // Check if image was given and save on local file system
            if (request('avatar')) {
                $absolutePath = public_path($student['avatar']);
-               File::delete($absolutePath);

                $student['avatar']  = save_image($student['avatar'], 'students');
            }
        });

        static::deleting(function ($student) {
            if ($student) {
                static::$selected_student_id = $student->id;
        
                // Delete the student's siblings
                StudentSibling::where('student_id', $student->id)->delete();
        
                // Check if there are other students with the same parent_id
                $siblings = StudentSibling::where('parent_id', $student->parent_id)->get();
        
                if ($siblings->count() > 1) {
                    // Get ids as a plain array of existing students in siblings table
                    $newIds = $siblings->pluck('student_id')->all();
        
                    foreach ($siblings as $sibling) {
                        $sibIds = array_diff($newIds, [$student->id, $sibling->id]);
                        $sibling->sibling_ids = $sibIds;
                        $sibling->save();
                    }
                }
        
                // Now remove the fee row for that student if it exists
                $fee = Fee::where('student_id', $student->id)->first();
                if ($fee) {
                    Fee::destroy($fee->id);
                }
            }
        });
        

        /*static::retrieved(function($data)
        {
            $data['info'] = "info";
        });*/
    }

    /**
     * @param StudentResource $student
     * @return array
     */
    public function manipulateStudentInfo(StudentResource $student): array
    {
        // Info: Here we are sending only basic information to student.
        $response['info'] = [
            "id" => $student->id,
            "name" => $student->name,
            "email" => $student->email,
            "aadhaar" => $student->aadhaar,
            "board_id" => $student->board_id,
            "board" => $student->board->name,
            "standard_id" => $student->standard_id,
            "standard" => $student->standard->name,
            "batch_id" => $student->batch_id,
            "batch" => $student->batch->name,
            "course_id" => $student->course_id,
            "mobile" => $student->mobile,
            "alt_mobile" => $student->alt_mobile,
            "gender" => $student->gender,
            "dob" => $student->dob,
            "permanent_address" => $student->permanent_address,
            "address" => $student->address,
            "avatar" => $student->avatar ? URL::to($student->avatar) : null,
        ];
        // Info: Now we have to check and manipulate student paper
        if (!empty($student->student_papers)) {
            // First: We will make an array of papers, subject wise.
            // Means, all the question paper of a subject will be in one array.
            foreach ($student->student_papers as $paper) {
                $key = json_decode($paper->subject->label);
                $defaultValue = [
                    'id' => $paper->id,
                    'batch_id' => $paper->batch_id,
                    'course_id' => $paper->course_id,
                    'subject_id' => $paper->subject_id,
                    'attempted_on' => $paper->attempted_on,
                    'total_time' => $paper->total_time,
                    'total_time_taken' => $paper->total_time_taken,
                    'total_marks' => $paper->total_marks,
                    'total_marks_scored' => $paper->total_marks_scored,
                    'unique_code' => $paper->unique_code,
                    'start_date' => $paper->start_date,
                    'end_date' => $paper->end_date,
                    'can_retest' => $paper->can_retest,
                    'show_result_on' => $paper->show_result_on,
                    'question_paper_name' => $paper->solved_questions['name'],
                ];
                // Second: We need to categorize all the papers according to the conditions.
                // Condition 1: If start date is NULL then student can give test paper at any time.
                // Condition 2: If today's date in greater than start date and less than end date.
                // Condition 3: If retest is set to 1, then student can give test paper within the given date range.
                $today = date('Y-m-d');
                // Start Condition 1

                if ($paper->start_date === null && $paper->attempted_on === null) {
                    $response['manipulated']['can_take_test'][$key][$paper->id] = $defaultValue;
                } // Start Condition 2
                else if ((($paper->start_date <= $today) && ($today <= $paper->end_date)) && $paper->attempted_on === null) {
                    $response['manipulated']['can_take_test'][$key][$paper->id] = $defaultValue;
                } // Start Condition 3
                else if ($paper->can_restest &&
                    (($paper->start_date <= $today) && ($today <= $paper->end_date)) &&
                    $paper->attempted_on === null) {
                    $response['manipulated']['can_take_test'][$key][$paper->id] = $defaultValue;
                } else if ($paper->attempted_on !== null) {
                    $response['manipulated']['test_taken'][$key][$paper->id] = $defaultValue;
                }
            }
        }
        return $response;
    }

    /**
     * @param array $request
     * @return array
     */
    private function saveFields(array $request): array
    {
        return [
            'name'=> $request->name,
            'email' => $request->email,
            'password' => Hash::make(123456789),
            'aadhaar' => $request->aadhaar,
            'board_id' => $request->board_id,
            'standard_id' => $request->standard_id,
            'batch_id' => $request->batch_id,
            'course_id' => $request->course_id,
            'mobile' => $request->mobile,
            'alt_mobile' => $request->alt_mobile,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'permanent_address' => $request->permanent_address,
            'address' => $request->address,
        ];
    }

}
