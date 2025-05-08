<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\BatchRepositoryInterface;
use App\Repositories\BatchRepository;
use App\Repositories\Interfaces\BoardRepositoryInterface;
use App\Repositories\BoardRepository;
use App\Repositories\Interfaces\InquiryRepositoryInterface;
use App\Repositories\InquiryRepository;
use App\Repositories\Interfaces\InquiryFollowupRepositoryInterface;
use App\Repositories\InquiryFollowupRepository;
use App\Repositories\Interfaces\InquiryFollowupTypeRepositoryInterface;
use App\Repositories\InquiryFollowupTypeRepository;
use App\Repositories\Interfaces\InquirySourceRepositoryInterface;
use App\Repositories\InquirySourceRepository;
use App\Repositories\Interfaces\InquiryStatusRepositoryInterface;
use App\Repositories\InquiryStatusRepository;
use App\Repositories\Interfaces\ChapterRepositoryInterface;
use App\Repositories\ChapterRepository;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Repositories\CourseRepository;
use App\Repositories\Interfaces\CourseTypeRepositoryInterface;
use App\Repositories\CourseTypeRepository;
use App\Repositories\Interfaces\FeeRepositoryInterface;
use App\Repositories\FeeRepository;
use App\Repositories\Interfaces\FeeBalanceRepositoryInterface;
use App\Repositories\FeeBalanceRepository;
use App\Repositories\Interfaces\FeeTypeRepositoryInterface;
use App\Repositories\FeeTypeRepository;
use App\Repositories\Interfaces\FeeStructureRepositoryInterface;
use App\Repositories\FeeStructureRepository;
use App\Repositories\Interfaces\FeeCategoryRepositoryInterface;
use App\Repositories\FeeCategoryRepository;
use App\Repositories\Interfaces\FeeDiscountRepositoryInterface;
use App\Repositories\FeeDiscountRepository;
use App\Repositories\Interfaces\FeeReciptRepositoryInterface;
use App\Repositories\FeeReciptRepository;
use App\Repositories\Interfaces\FeeStudentDiscountRepositoryInterface;
use App\Repositories\FeeStudentDiscountRepository;
use App\Repositories\Interfaces\FeeTransactionRepositoryInterface;
use App\Repositories\FeeTransactionRepository;
use App\Repositories\Interfaces\GeneratedQuestionPaperRepositoryInterface;
use App\Repositories\GeneratedQuestionPaperRepository;
use App\Repositories\Interfaces\StandardRepositoryInterface;
use App\Repositories\StandardRepository;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Repositories\StudentRepository;
use App\Repositories\Interfaces\StudentPaperRepositoryInterface;
use App\Repositories\StudentPaperRepository;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use App\Repositories\SubjectRepository;
use App\Repositories\Interfaces\TemplateRepositoryInterface;
use App\Repositories\TemplateRepository;
use App\Repositories\Interfaces\TopicRepositoryInterface;
use App\Repositories\TopicRepository;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use App\Repositories\SettingRepository;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\RoleRepository;
use App\Repositories\Interfaces\ProfileRepositoryInterface;
use App\Repositories\ProfileRepository;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Repositories\QuestionRepository;
use App\Repositories\Interfaces\DashboardRepositoryInterface;
use App\Repositories\DashboardRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BatchRepositoryInterface::class, BatchRepository::class);
        $this->app->bind(BoardRepositoryInterface::class, BoardRepository::class);
        $this->app->bind(InquiryRepositoryInterface::class, InquiryRepository::class);
        $this->app->bind(InquirySourceRepositoryInterface::class, InquirySourceRepository::class);
        $this->app->bind(InquiryStatusRepositoryInterface::class, InquiryStatusRepository::class);
        $this->app->bind(InquiryFollowupRepositoryInterface::class, InquiryFollowupRepository::class);
        $this->app->bind(InquiryFollowupTypeRepositoryInterface::class, InquiryFollowupTypeRepository::class);
        $this->app->bind(ChapterRepositoryInterface::class, ChapterRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
        $this->app->bind(CourseTypeRepositoryInterface::class, CourseTypeRepository::class);
        $this->app->bind(FeeRepositoryInterface::class, FeeRepository::class);
        $this->app->bind(FeeBalanceRepositoryInterface::class, FeeBalanceRepository::class);
        $this->app->bind(FeeTypeRepositoryInterface::class, FeeTypeRepository::class);
        $this->app->bind(FeeStructureRepositoryInterface::class, FeeStructureRepository::class);
        $this->app->bind(FeeCategoryRepositoryInterface::class, FeeCategoryRepository::class);
        $this->app->bind(FeeDiscountRepositoryInterface::class, FeeDiscountRepository::class);
        $this->app->bind(FeeReciptRepositoryInterface::class, FeeReciptRepository::class);
        $this->app->bind(FeeTransactionRepositoryInterface::class, FeeTransactionRepository::class);
        $this->app->bind(FeeStudentDiscountRepositoryInterface::class, FeeStudentDiscountRepository::class);
        $this->app->bind(GeneratedQuestionPaperRepositoryInterface::class, GeneratedQuestionPaperRepository::class);
        $this->app->bind(StandardRepositoryInterface::class, StandardRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(StudentPaperRepositoryInterface::class, StudentPaperRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this->app->bind(TemplateRepositoryInterface::class, TemplateRepository::class);
        $this->app->bind(TopicRepositoryInterface::class, TopicRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(DashboardRepositoryInterface::class, DashboardRepository::class);
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
