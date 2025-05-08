<?php

namespace Database\Seeders;

use App\Models\FeeType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleAndPermissionSeeder::class,
            DocumentTypeSeeder::class,
            LanguageSeeder::class,
            DifficultyLevelSeeder::class,
            QuestTypeSeeder::class,
            BoardSeeder::class,
            StandardSeeder::class,
            SectionSeeder::class,
            CourseTypeSeeder::class,
            CourseSeeder::class,
            SubjectSeeder::class,
            BatchSeeder::class,
            InquirySourceSeeder::class,
            InquiryStatusSeeder::class,
            InquiryTypeSeeder::class,
            FeeTypeSeeder::class,
            FeeCategorySeeder::class,
            FeeDiscountSeeder::class,
            ClientProjectSeeder::class,
            LeaveTypesSeeder::class,
            LeaveStatusesSeeder::class,
            LeaveBalanceSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

    }
}
