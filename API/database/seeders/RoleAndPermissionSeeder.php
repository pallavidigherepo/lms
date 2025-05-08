<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use App\Models\ProfileUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // We have to follow strict protocol for adding permissions.
        // It must always be actionName_moduleName !!!VERY IMPORTANT

        // create batches
        Permission::create(['name' => 'index batches']);
        Permission::create(['name' => 'show batches']);
        Permission::create(['name' => 'create batches']);
        Permission::create(['name' => 'update batches']);
        Permission::create(['name' => 'destroy batches']);

        // create boards
        Permission::create(['name' => 'index boards']);
        Permission::create(['name' => 'show boards']);
        Permission::create(['name' => 'create boards']);
        Permission::create(['name' => 'update boards']);
        Permission::create(['name' => 'destroy boards']);

        // create client projects
        Permission::create(['name' => 'index clientProjects']);
        Permission::create(['name' => 'show clientProjects']);
        Permission::create(['name' => 'create clientProjects']);
        Permission::create(['name' => 'update clientProjects']);
        Permission::create(['name' => 'destroy clientProjects']);

        // Course's permissions
        Permission::create(['name' => 'index courses']);
        Permission::create(['name' => 'show courses']);
        Permission::create(['name' => 'create courses']);
        Permission::create(['name' => 'update courses']);
        Permission::create(['name' => 'destroy courses']);

        // Course types permissions
        Permission::create(['name' => 'index coursesTypes']);
        Permission::create(['name' => 'show coursesTypes']);
        Permission::create(['name' => 'create coursesTypes']);
        Permission::create(['name' => 'update coursesTypes']);
        Permission::create(['name' => 'destroy coursesTypes']);


        // create fees
        Permission::create(['name' => 'index fees']);
        Permission::create(['name' => 'show fees']);
        Permission::create(['name' => 'create fees']);
        Permission::create(['name' => 'update fees']);
        Permission::create(['name' => 'destroy fees']);

        // create fee_categories
        Permission::create(['name' => 'index feeCategories']);
        Permission::create(['name' => 'show feeCategories']);
        Permission::create(['name' => 'create feeCategories']);
        Permission::create(['name' => 'update feeCategories']);
        Permission::create(['name' => 'destroy feeCategories']);

        // create fee_discounts
        Permission::create(['name' => 'index feeDiscounts']);
        Permission::create(['name' => 'show feeDiscounts']);
        Permission::create(['name' => 'create feeDiscounts']);
        Permission::create(['name' => 'update feeDiscounts']);
        Permission::create(['name' => 'destroy feeDiscounts']);

        // create fee_transactions
        Permission::create(['name' => 'index feeTransactions']);
        Permission::create(['name' => 'show feeTransactions']);
        Permission::create(['name' => 'create feeTransactions']);
        Permission::create(['name' => 'update feeTransactions']);
        Permission::create(['name' => 'destroy feeTransactions']);

        // create fee_types
        Permission::create(['name' => 'index feeTypes']);
        Permission::create(['name' => 'show feeTypes']);
        Permission::create(['name' => 'create feeTypes']);
        Permission::create(['name' => 'update feeTypes']);
        Permission::create(['name' => 'destroy feeTypes']);

        // create fee_structures
        Permission::create(['name' => 'index feeStructures']);
        Permission::create(['name' => 'show feeStructures']);
        Permission::create(['name' => 'create feeStructures']);
        Permission::create(['name' => 'update feeStructures']);
        Permission::create(['name' => 'destroy feeStructures']);

        // create generated_question_papers
        Permission::create(['name' => 'index generatedQuestionPapers']);
        Permission::create(['name' => 'show generatedQuestionPapers']);
        Permission::create(['name' => 'create generatedQuestionPapers']);
        Permission::create(['name' => 'update generatedQuestionPapers']);
        Permission::create(['name' => 'destroy generatedQuestionPapers']);

        // create inquiries
        Permission::create(['name' => 'index inquiries']);
        Permission::create(['name' => 'show inquiries']);
        Permission::create(['name' => 'create inquiries']);
        Permission::create(['name' => 'update inquiries']);
        Permission::create(['name' => 'destroy inquiries']);

        // create inquiry_followup_types
        Permission::create(['name' => 'index inquiryFollowupTypes']);
        Permission::create(['name' => 'show inquiryFollowupTypes']);
        Permission::create(['name' => 'create inquiryFollowupTypes']);
        Permission::create(['name' => 'update inquiryFollowupTypes']);
        Permission::create(['name' => 'destroy inquiryFollowupTypes']);

        // create inquiry_sources
        Permission::create(['name' => 'index inquirySources']);
        Permission::create(['name' => 'show inquirySources']);
        Permission::create(['name' => 'create inquirySources']);
        Permission::create(['name' => 'update inquirySources']);
        Permission::create(['name' => 'destroy inquirySources']);

        // create inquiry_statuses
        Permission::create(['name' => 'index inquiryStatuses']);
        Permission::create(['name' => 'show inquiryStatuses']);
        Permission::create(['name' => 'create inquiryStatuses']);
        Permission::create(['name' => 'update inquiryStatuses']);
        Permission::create(['name' => 'destroy inquiryStatuses']);

        // create permissions
        Permission::create(['name' => 'index permissions']);
        Permission::create(['name' => 'show permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'destroy permissions']);

        // Questions types permissions
        Permission::create(['name' => 'index questions']);
        Permission::create(['name' => 'show questions']);
        Permission::create(['name' => 'create questions']);
        Permission::create(['name' => 'update questions']);
        Permission::create(['name' => 'destroy questions']);

        // create permissions for roles
        Permission::create(['name' => 'index roles']);
        Permission::create(['name' => 'show roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'destroy roles']);

        // create settings
        Permission::create(['name' => 'index settings']);
        Permission::create(['name' => 'show settings']);
        Permission::create(['name' => 'create settings']);
        Permission::create(['name' => 'update settings']);
        Permission::create(['name' => 'destroy settings']);

        // create standards
        Permission::create(['name' => 'index standards']);
        Permission::create(['name' => 'show standards']);
        Permission::create(['name' => 'create standards']);
        Permission::create(['name' => 'update standards']);
        Permission::create(['name' => 'destroy standards']);

        // Students permission
        Permission::create(['name' => 'index students']);
        Permission::create(['name' => 'show students']);
        Permission::create(['name' => 'create students']);
        Permission::create(['name' => 'update students']);
        Permission::create(['name' => 'destroy students']);
        Permission::create(['name' => 'index own students']);
        Permission::create(['name' => 'show own students']);
        Permission::create(['name' => 'create own students']);
        Permission::create(['name' => 'update own students']);
        Permission::create(['name' => 'destroy own students']);


        // create studentDocuments
        Permission::create(['name' => 'index studentDocuments']);
        Permission::create(['name' => 'show studentDocuments']);
        Permission::create(['name' => 'create studentDocuments']);
        Permission::create(['name' => 'update studentDocuments']);
        Permission::create(['name' => 'destroy studentDocuments']);

        // create studentPapers
        Permission::create(['name' => 'index studentPapers']);
        Permission::create(['name' => 'show studentPapers']);
        Permission::create(['name' => 'create studentPapers']);
        Permission::create(['name' => 'update studentPapers']);
        Permission::create(['name' => 'destroy studentPapers']);

        // create studentParents
        Permission::create(['name' => 'index studentParents']);
        Permission::create(['name' => 'show studentParents']);
        Permission::create(['name' => 'create studentParents']);
        Permission::create(['name' => 'update studentParents']);
        Permission::create(['name' => 'destroy studentParents']);

        // Subjects types permissions
        Permission::create(['name' => 'index subjects']);
        Permission::create(['name' => 'show subjects']);
        Permission::create(['name' => 'create subjects']);
        Permission::create(['name' => 'update subjects']);
        Permission::create(['name' => 'destroy subjects']);

        // create chapters
        Permission::create(['name' => 'index chapters']);
        Permission::create(['name' => 'show chapters']);
        Permission::create(['name' => 'create chapters']);
        Permission::create(['name' => 'update chapters']);
        Permission::create(['name' => 'destroy chapters']);

        // create topics
        Permission::create(['name' => 'index topics']);
        Permission::create(['name' => 'show topics']);
        Permission::create(['name' => 'create topics']);
        Permission::create(['name' => 'update topics']);
        Permission::create(['name' => 'destroy topics']);

        // create templates
        Permission::create(['name' => 'index templates']);
        Permission::create(['name' => 'show templates']);
        Permission::create(['name' => 'create templates']);
        Permission::create(['name' => 'update templates']);
        Permission::create(['name' => 'destroy templates']);

        // User's permissions
        Permission::create(['name' => 'index users']);
        Permission::create(['name' => 'show users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'destroy users']);
        Permission::create(['name' => 'editRole users']);
        Permission::create(['name' => 'changePassword users']);

        // Now that we have created all the permissions, we will now create roles and start assigning permissions to it.
        // Let's GO
        $superAdmin = Role::create(['name' => 'Super Admin']);
        // all admins have all permissions
        $superAdminPermissions = Permission::all();
        $superAdmin->syncPermissions($superAdminPermissions);

        $director = Role::create(['name' => 'Director']);
        // all admins have all permissions

        $directorPermissions = [
            'index fees',
            'show fees',
            'create fees',
            'update fees',
            'destroy fees',
            'index feeDiscounts',
            'show feeDiscounts',
            'create feeDiscounts',
            'update feeDiscounts',
            'destroy feeDiscounts',
            'index feeTransactions',
            'show feeTransactions',
            'create feeTransactions',
            'update feeTransactions',
            'destroy feeTransactions',
            'index feeStructures',
            'show feeStructures',
            'create feeStructures',
            'update feeStructures',
            'destroy feeStructures',
            'index generatedQuestionPapers',
            'show generatedQuestionPapers',
            'create generatedQuestionPapers',
            'update generatedQuestionPapers',
            'destroy generatedQuestionPapers',
            'index inquiries',
            'show inquiries',
            'create inquiries',
            'update inquiries',
            'destroy inquiries',
            'index questions',
            'show questions',
            'create questions',
            'update questions',
            'destroy questions',
            'index students',
            'show students',
            'create students',
            'update students',
            'destroy students',
            'index own students',
            'show own students',
            'create own students',
            'update own students',
            'destroy own students',
            'index studentDocuments',
            'show studentDocuments',
            'create studentDocuments',
            'update studentDocuments',
            'destroy studentDocuments',
            'index studentPapers',
            'show studentPapers',
            'create studentPapers',
            'update studentPapers',
            'destroy studentPapers',
            'index studentParents',
            'show studentParents',
            'create studentParents',
            'update studentParents',
            'destroy studentParents',
            'index subjects',
            'show subjects',
            'create subjects',
            'update subjects',
            'destroy subjects',
            'index templates',
            'show templates',
            'create templates',
            'update templates',
            'destroy templates',
            'index users',
            'show users',
            'create users',
            'update users',
            'destroy users',
            'editRole users',
            'changePassword users',
            'index chapters',
            'show chapters',
            'create chapters',
            'update chapters',
            'destroy chapters',
            'index topics',
            'show topics',
            'create topics',
            'update topics',
            'destroy topics',
        ];
        // Assign permissions
        $director->syncPermissions($directorPermissions);

        $principal = Role::create(['name' => 'Principle']);
        // all admins have all permissions
        // Assign permissions
        $principal->syncPermissions($directorPermissions);

        $accountant = Role::create(['name' => 'Accountant']);
        // Assign permissions
        $accountantPermissions = [
            'index fees',
            'show fees',
            'create fees',
            'update fees',
            'destroy fees',
            'index feeDiscounts',
            'show feeDiscounts',
            'create feeDiscounts',
            'update feeDiscounts',
            'destroy feeDiscounts',
            'index feeTransactions',
            'show feeTransactions',
            'create feeTransactions',
            'update feeTransactions',
            'destroy feeTransactions',
            'index feeStructures',
            'show feeStructures',
            'create feeStructures',
            'update feeStructures',
            'destroy feeStructures',
            'index inquiries',
            'show inquiries',
            'create inquiries',
            'update inquiries',
            'destroy inquiries',
            'index students',
            'show students',
            'create students',
            'update students',
            'destroy students',
            'index studentDocuments',
            'show studentDocuments',
            'create studentDocuments',
            'update studentDocuments',
            'destroy studentDocuments',
            'index studentParents',
            'show studentParents',
            'create studentParents',
            'update studentParents',
            'destroy studentParents',
            'index users',
            'show users',
            'create users',
            'update users',
        ];
        $accountant->syncPermissions($accountantPermissions);

        $teacher = Role::create(['name' => 'Teacher']);
        // Assign permissions
        $teacherPermissions = [
            'index generatedQuestionPapers',
            'show generatedQuestionPapers',
            'create generatedQuestionPapers',
            'update generatedQuestionPapers',
            'destroy generatedQuestionPapers',
            'index questions',
            'show questions',
            'create questions',
            'update questions',
            'destroy questions',
            'index own students',
            'show own students',
            'create own students',
            'update own students',
            'destroy own students',
            'index studentPapers',
            'show studentPapers',
            'create studentPapers',
            'update studentPapers',
            'destroy studentPapers',
            'index subjects',
            'show subjects',
            'index templates',
            'show templates',
            'create templates',
            'update templates',
            'destroy templates',
            'index users',
            'show users',
            'create users',
            'update users',
            'destroy users',
            'editRole users',
            'changePassword users',
            'index chapters',
            'show chapters',
            'create chapters',
            'update chapters',
            'destroy chapters',
            'index topics',
            'show topics',
            'create topics',
            'update topics',
            'destroy topics',
        ];
        $teacher->syncPermissions($teacherPermissions);

        $clerk = Role::create(['name' => 'Clerk']);
        // Assign permissions
        $clerkPermissions = [
            'show users',
            'update users',
            'changePassword users',
        ];
        $clerk->syncPermissions($clerkPermissions);

        $superAdminUser = User::create([
                'name'=> 'Pallavi Dighe',
                'email' => 'pallavi@meritest.in',
                'password' => Hash::make(123456789),
            ]
        );

        $superAdminUser->profile_user()->save(new ProfileUser([
            'mobile' => 7030501188,
            'designation' => 'Super Admin',
        ]));
        $superAdminUser->assignRole($superAdmin);

        $directorUser = User::create([
            'name'=> 'Ravindra Ashtankar',
            'email' => 'ravindra.ashtankar@meritest.in',
            'password' => Hash::make(123456789),
        ]);

        $directorUser->profile_user()->save(new ProfileUser([
            'mobile' => 9921547073,
            'designation' => 'Director',
        ]));
        $directorUser->assignRole($director);

        $principalUser = User::create([
            'name'=> 'Rushika Ashtankar',
            'email' => 'rushika.ashtankar@meritest.in',
            'password' => Hash::make(123456789),
        ]);

        $principalUser->profile_user()->save(new ProfileUser([
            'mobile' => 9011412030,
            'designation' => 'Principal',
        ]));
        $principalUser->assignRole($principal);

        $accountantUser = User::create([
            'name'=> 'Tikaram Gurnule',
            'email' => 'tikaram.gurnule@meritest.in',
            'password' => Hash::make(123456789),

        ]);
        $accountantUser->profile_user()->save(new ProfileUser([
            'mobile' => 8087370193,
            'designation' => 'Accountant',
        ]));
        $accountantUser->assignRole($accountant);

        $accountantUser = User::create([
            'name'=> 'Kranti Sutrapawar',
            'email' => 'kranti.sutrapawar@meritest.in',
            'password' => Hash::make(123456789),

        ]);
        $accountantUser->profile_user()->save(new ProfileUser([
            'mobile' => 8669611043,
            'designation' => 'Accountant',
        ]));
        $accountantUser->assignRole($accountant);

        $teacher1 = User::create([
            'name'=> 'Suvarna Durge',
            'email' => 'suvarna.durge@meritest.in',
            'password' => Hash::make(123456789),
        ]);
        $teacher1->profile_user()->save(new ProfileUser([
            'mobile' => 7620885682,
            'designation' => 'Teacher',
        ]));
        $teacher1->assignRole($teacher);

        $teacher2 = User::create([
            'name'=> 'Ujjwala',
            'email' => 'ujjwala@meritest.in',
            'password' => Hash::make(123456789),
        ]);
        $teacher2->profile_user()->save(new ProfileUser([
            'mobile' => 1234567890,
            'designation' => 'Teacher',
        ]));
        $teacher2->assignRole($teacher);

        $clerkUser = User::create([
            'name'=> 'Pooja',
            'email' => 'pooja@meritest.in',
            'password' => Hash::make(123456789),
        ]);
        $clerkUser->profile_user()->save(new ProfileUser([
            'mobile' => 1234567890,
            'designation' => 'Clerk',
        ]));

        $clerkUser->assignRole($clerk);
    }
}
