import authModule from "./modules/auth/index.js";
import batchesModule from "./modules/batches/index.js";
import coursesModule from "./modules/courses/index.js";
import subjectsModule from "./modules/subjects/index.js";
import standardsModule from "./modules/standards/index.js";
import coursesTypesModule from "./modules/courses_types/index.js";
import studentsModule from "./modules/students/index.js";
import parentsModule from "./modules/parents/index.js";
import questionsModule from "./modules/questions/index.js";
import templatesModule from "./modules/templates/index.js";
import generateQuestionModule from './modules/generate_questions/index.js';
import fee_typesModule from "./modules/fee_types/index.js";
import fee_structuresModule from "./modules/fee_structures/index.js";
import inquiry_followup_typesModule from "./modules/inquiry_followup_types/index.js";
import inquiry_sourcesModule from "./modules/inquiry_sources/index.js";
import inquiry_statusesModule from "./modules/inquiry_statuses/index.js";
import usersModule from "./modules/users/index.js";
import feesModule from "./modules/fees/index.js";
import inquiriesModule from "./modules/inquiries/index.js";
import rolesModule from "./modules/roles/index.js";
import permissionsModule from "./modules/permissions/index.js";
import chaptersModule from "./modules/chapters/index.js";
import topicsModule from "./modules/topics/index.js";
import inquiryFollowupModule from "./modules/inquiry_followups/index.js";
import feeCategoryModule from "./modules/fee_categories/index.js";
import feeDiscountModule from "./modules/fee_discounts/index.js";
import leaveModule from "./modules/leave/index.js";


export default {
  auth: authModule,
  batches: batchesModule,
  courses: coursesModule,
  subjects: subjectsModule,
  standards: standardsModule,
  coursesTypes: coursesTypesModule,
  students: studentsModule,
  parents: parentsModule,
  questions: questionsModule,
  templates: templatesModule,
  generated_questions: generateQuestionModule,
  fee_types: fee_typesModule,
  fee_structures: fee_structuresModule,
  inquiry_followup_types: inquiry_followup_typesModule,
  inquiry_sources: inquiry_sourcesModule,
  inquiry_statuses: inquiry_statusesModule,
  users: usersModule,
  fees: feesModule,
  inquiries: inquiriesModule,
  roles: rolesModule,
  permissions: permissionsModule,
  chapters: chaptersModule,
  topics: topicsModule,
  inquiry_followups: inquiryFollowupModule,
  fee_categories: feeCategoryModule,
  fee_discounts: feeDiscountModule,
  leave: leaveModule,
  
};
