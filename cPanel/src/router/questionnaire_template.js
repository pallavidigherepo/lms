// import QuestionnaireDashboard from "../views/Questionnaire/Index.vue";

import PaperGenerator from "../views/GeneratedQuestions/Create.vue";
import GeneratedQuestionPapers from "../views/GeneratedQuestions/Index.vue";
import ShowGeneratedQuestionPaper from "../views/GeneratedQuestions/Show.vue";
import EditGeneratedQuestionPaper from "../views/GeneratedQuestions/Edit.vue";
import AssignToStudent from "../views/GeneratedQuestions/AssignStudent.vue";

import Templates from '../views/Templates/Index.vue';
import CreateTemplate from '../views/Templates/Create.vue';
import EditTemplate from '../views/Templates/Edit.vue';
import ShowTemplate from '../views/Templates/Show.vue';

const questionnaireTemplateRoutes = [
    // {
    //     path: "/questionnaire",
    //     name: "QuestionnaireDashboard",
    //     component: QuestionnaireDashboard,

    // },
    {
        path: "/generated_question_papers",
        name: "GeneratedQuestionPapers",
        component: GeneratedQuestionPapers,
        meta: {
            parent: 'GeneratedQuestionPapers'
        },
    },
    {
        path: "/generated_question_papers/:id",
        name: "EditGeneratedQuestionPaper",
        component: EditGeneratedQuestionPaper,
        meta: {
            parent: 'GeneratedQuestionPapers'
        },
    },
    {
        path: "/generated_question_papers/:id",
        name: "ShowGeneratedQuestionPaper",
        component: ShowGeneratedQuestionPaper,
        meta: {
            parent: 'GeneratedQuestionPapers'
        },
    },
    {
        path: "/generated_question_papers/assign/:id",
        name: "AssignToStudent",
        component: AssignToStudent,
        meta: {
            parent: 'GeneratedQuestionPapers'
        },
    },
    {
        path: "/templates",
        name: "Templates",
        component: Templates,
        meta: {
            parent: 'Templates'
        },
        children: [{
            path: '/templates/create',
            name: "CreateTemplate",
            component: CreateTemplate,
            meta: {
                parent: 'Templates'
            }
        },
            {
                path: '/templates/:id/edit',
                name: "EditTemplate",
                component: EditTemplate,
                meta: {
                    parent: 'Templates'
                }
            },
            {
                path: '/templates/:id',
                name: "ShowTemplate",
                component: ShowTemplate,
                meta: {
                    parent: 'Templates'
                }
            },
            {
                path: '/templates/:id/generate_paper',
                name: "PaperGenerator",
                component: PaperGenerator,
                meta: {
                    parent: 'Templates'
                }
            }
        ]
    },
];

export default questionnaireTemplateRoutes;
