<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Fee;
use App\Models\User;
use App\Models\Batch;
use App\Models\Board;
use App\Models\Topic;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\FeeType;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Language;
use App\Models\Standard;
use App\Models\Template;
use Maatwebsite\Excel\Row;
use App\Models\CoursesType;
use App\Models\FeeCategory;
use Illuminate\Support\Str;
use App\Models\DocumentType;
use App\Models\FeeStructure;
use App\Models\QuestionType;
use App\Models\InquirySource;
use App\Models\InquiryStatus;
use App\Models\FeeStudentDiscount;
//
use App\Models\InquiryFollowupType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\GeneratedQuestionPaper;
use App\Models\QuestionDifficultyLevel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;

use Illuminate\Auth\Events\PasswordReset;

use App\Http\Resources\FeeStructureResource;
use App\Http\Controllers\Api\V1\FeeController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\BatchController;
use App\Http\Controllers\Api\V1\BoardController;
use App\Http\Controllers\Api\V1\LeaveController;
use App\Http\Controllers\Api\V1\TopicController;
use App\Http\Controllers\Api\V1\CourseController;
use App\Http\Controllers\Api\V1\ExportController;
use App\Http\Controllers\Api\V1\ImportController;
use App\Http\Controllers\Api\V1\ChapterController;
use App\Http\Controllers\Api\V1\FeeTypeController;
use App\Http\Controllers\Api\V1\InquiryController;
use App\Http\Controllers\Api\V1\ProfileController;

use App\Http\Controllers\Api\V1\SettingController;
use App\Http\Controllers\Api\V1\StudentController;
use App\Http\Controllers\Api\V1\SubjectController;
use App\Http\Controllers\Api\V1\QuestionController;
use App\Http\Controllers\Api\V1\StandardController;

use App\Http\Controllers\Api\V1\TemplateController;
use App\Http\Controllers\Api\V1\DashboardController;
use App\Http\Controllers\Api\V1\LeaveTypeController;
use App\Http\Controllers\Api\V1\PermissionController;
use App\Http\Controllers\Api\V1\CoursesTypeController;
use App\Http\Controllers\Api\V1\FeeCategoryController;
use App\Http\Controllers\Api\V1\FeeDiscountController;
use App\Http\Controllers\Api\V1\FeeStructureController;
use App\Http\Controllers\Api\V1\StudentPaperController;
use App\Http\Controllers\Api\V1\InquirySourceController;
use App\Http\Controllers\Api\V1\InquiryStatusController;
use App\Http\Controllers\Api\V1\StudentParentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Api\V1\FeeTransactionController;
use App\Http\Controllers\Api\V1\InquiryFollowupController;
use App\Http\Controllers\Api\V1\InquiryFollowupTypeController;
use App\Http\Controllers\Api\V1\GeneratedQuestionPaperController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['middleware' => ['auth:sanctum', \App\Http\Middleware\DatabaseSwitcher::class]], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('v1/logout', [AuthController::class, 'logout']);

    Route::post('v1/leaves', [LeaveController::class, 'applyLeave']);
    Route::get('v1/leaves/balance', [LeaveController::class, 'viewLeaveBalance']);
    Route::get('v1/leaves/requests', [LeaveController::class, 'viewLeaveRequests']);
    Route::post('v1/leaves/{id}/approve', [LeaveController::class, 'approveLeave']);
    Route::post('v1/leaves/{id}/reject', [LeaveController::class, 'rejectLeave']);

    //
    Route::get('v1/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('v1/permissions/modules', [PermissionController::class, 'modules'])->name('permissions.modules');
    Route::resource('v1/permissions', PermissionController::class);
    Route::resource('v1/roles', RoleController::class);
    Route::get('v1/users/role_list', [UserController::class, 'role_list'])->name('users.role_list');

    Route::resource('v1/users', UserController::class);
    Route::get('v1/courses_types/list', [CoursesTypeController::class, 'list'])->name('coursesTypes.list');
    Route::resource('v1/batches', BatchController::class);
    Route::resource('v1/courses_types', CoursesTypeController::class);
    Route::resource('v1/courses', CourseController::class);
    Route::resource('v1/subjects', SubjectController::class);
    Route::resource('v1/chapters', ChapterController::class);
    Route::resource('v1/topics', TopicController::class);
    Route::resource('v1/questions', QuestionController::class);
    Route::resource('v1/students', StudentController::class);
    Route::resource('v1/profile', ProfileController::class);
    Route::resource('v1/templates', TemplateController::class);
    Route::resource('v1/generated_questions', GeneratedQuestionPaperController::class);
    Route::resource('v1/student_papers', StudentPaperController::class);
    Route::resource('v1/inquiry_statuses', InquiryStatusController::class);
    Route::resource('v1/inquiry_sources', InquirySourceController::class);
    Route::resource('v1/inquiry_followup_types', InquiryFollowupTypeController::class);
    Route::resource('v1/inquiries', InquiryController::class);
    Route::resource('v1/inquiry_followups', InquiryFollowupController::class);
    Route::resource('v1/boards', BoardController::class);
    Route::resource('v1/standards', StandardController::class);
    Route::resource('v1/fee_types', FeeTypeController::class);
    Route::resource('v1/fee_categories', FeeCategoryController::class);
    Route::resource('v1/fee_discounts', FeeDiscountController::class);
    Route::resource('v1/fee_structures', FeeStructureController::class);
    Route::resource('v1/fees', FeeController::class);
    Route::resource('v1/fee_transactions', FeeTransactionController::class);
    Route::resource('v1/leave-types', LeaveTypeController::class);


    Route::resource('v1/parents', StudentParentController::class);
    Route::resource('v1/settings', SettingController::class);

    Route::post('v1/exports/index', [ExportController::class, 'index'])->name('exports.index');
    Route::post('v1/imports', [ImportController::class, 'store'])->name('imports.store');

    Route::get('v1/languages', function () {
        return Language::all()->pluck('name', 'id');
    })->name('languages');

    Route::get('v1/courses_list', function () {
        return Course::all()->pluck('name', 'id');
    })->name('courses_list');

    // Route::get('v1/subject_list', function () {
    //     return Subject::all()->pluck('label', 'id');
    // })->name('subject_list');

    Route::get('v1/course_type_list', function () {
        return CoursesType::all()->pluck('label', 'id');
    })->name('course_type_list');

    Route::get('v1/subject_list/{boardId}/{standardId}', function ($boardId, $standardId) {
        return Subject::all()
            ->where('board_id', $boardId)
            ->where('standard_id', $standardId)
            ->where('parent_id', null)
            ->pluck('label', 'id');
    })->name('subject_list');

    Route::get('v1/get_subject_name/{subjectId}', function ($subjectId) {
        $subject = Subject::findOrFail($subjectId);
        return json_decode($subject->label);
    })->name('get_subject_name');

    Route::get('v1/chapter_list/{subjectId}', function ($subjectId) {
        return Chapter::all()->where('parent_id', $subjectId)->pluck('label', 'id');
    })->name('chapter_list');

    Route::get('v1/topic_list/{chapterId}', function ($chapterId) {
        return Topic::all()->where('parent_id', $chapterId)->pluck('label', 'id');
    })->name('topic_list');

    Route::get('v1/board_list', function () {
        return Board::all()->pluck('name', 'id');
    })->name('board_list');

    Route::get('v1/batch_list', function () {
        return Batch::pluck('name', 'id');
    })->name('batch_list');

    Route::get('v1/standard_list', function () {
        return Standard::all()->pluck('name', 'id');
    })->name('standard_list');

    Route::get('v1/difficulty_level_list', function () {
        return QuestionDifficultyLevel::all()->pluck('name', 'id');
    })->name('difficulty_level_list');

    Route::get('v1/type_list', function () {
        return QuestionType::all()->where('is_active', true)->pluck('name', 'id');
    })->name('type_list');

    Route::get('v1/type_list_paragraph', function () {
        return QuestionType::all()->where('is_active', true)->where('in_paragraph', true)->pluck('name', 'id');
    })->name('type_list_paragraph');

    Route::get('v1/inquiry_sources_list', function () {
        return InquirySource::all()->pluck('name', 'id');
    })->name('inquiry_sources_list');

    Route::get('v1/inquiry_followup_types_list', function () {
        return InquiryFollowupType::all()->pluck('name', 'id');
    })->name('inquiry_followup_types_list');

    Route::get('v1/inquiry_status_list', function () {
        return InquiryStatus::all()->pluck('name', 'id');
    })->name('inquiry_status_list');

    Route::get('v1/inquiry_assignees', function () {
        return User::all()->pluck('name', 'id');
    })->name('inquiry_assignees');

    Route::get('v1/fee_category_list', function () {
        return FeeCategory::all()->pluck('name', 'id');
    })->name('fee_category_list');

    Route::get('v1/fee_type_list', function () {
        return FeeType::all()->pluck('name', 'id');
    })->name('fee_type_list');

    Route::get('v1/document_types_list', function () {
        return DocumentType::all()->pluck('name', 'id');
    })->name('document_types_list');

    Route::get('v1/standard_section_list', function () {
        return Section::all()->pluck('name', 'id');
    })->name('standard_section_list');


    Route::get('v1/fee_structure_list/{standardId}/{batchId}/{feeTypeId}', function ($standardId, $batchId, $feeTypeId) {
        return FeeStructureResource::collection(

            FeeStructure::all()
                ->where('standard_id', $standardId)
                ->where('batch_id', $batchId)
                ->where('fee_type_id', $feeTypeId)
            );

    })->name('fee_structure_list');

    Route::get('v1/student_discounts/{studentId}', function ($studentId) {
        return FeeStudentDiscount::getAvailableDiscountsForStudent($studentId);

    })->name('student_discounts');

    Route::get('v1/check_fee_balance/{feeId}', function ($feeId) {
        return Fee::findOrFail($feeId);
    })->name('check_fee_balance');


    Route::get('v1/questionnaire', function () {
        $templateCount = Template::all()->count();
        $generatedQuestionPaperCount = GeneratedQuestionPaper::all()->count();
        $latestTemplates = Template::latest()->take(5)->get();
        $latestQuestionPaper = GeneratedQuestionPaper::latest()->take(5)->get();
        return compact('templateCount', 'generatedQuestionPaperCount', 'latestTemplates', 'latestQuestionPaper');
    })->name('questionnaire');

    Route::get('v1/general_report', function (){
        // Get Students count
        $studentCount = Student::all()->count();
        // Get Teachers count
        $teacherCount  = User::all()->count();
        // Get Collected Fee amount
        $feeCollected = Fee::all()->count();
        // Get Outstanding fee amount
        $feeOutstanding = Fee::all()->count();
    })->name('general_report');

    Route::get('v1/check_user_permissions', function () {
        return [
            'roles' => auth()->user()->getRoleNames(),
            'permissions' => auth()->user()->getAllPermissions()->pluck('name'),
        ];
    })->name('check_user_permissions');
})->middleware('auth:sanctum');

Route::post('v1/login', [AuthController::class, 'login']);
Route::post('v1/forgot_password', [AuthController::class, 'forgot_password']);
Route::post('v1/reset_password', [AuthController::class, 'reset_password'])->name('password.reset');

