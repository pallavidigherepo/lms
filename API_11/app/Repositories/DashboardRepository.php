<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Http\Resources\CourseResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\BatchResource;
use App\Repositories\Interfaces\DashboardRepositoryInterface;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class DashboardRepository implements DashboardRepositoryInterface
{
    public function all($userId = null)
    {

        $user = User::findOrFail($userId);

        $response = [
            'general_report' => $this->_getGeneralReport($user),
        ];
        $roles = $user->roles->pluck('name')->toArray();
        $response['user_role'] = implode(',', $roles);
        return $response;
    }

    private function _getGeneralReport($user = null)
    {
        $roles = $user->roles->pluck('name')->toArray();

        $userCount = User::count();
        $studentCount = Student::count();
        $courseCount = Course::count();
        $subjectCount = Subject::count();

        // Preparing the response array
        $response = [
            'user_count' => $userCount,
            'student_count' => $studentCount,
            'course_count' => $courseCount,
            'subject_count' => $subjectCount,
        ];
        

        return $response;
    }

}
