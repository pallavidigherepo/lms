// import InquiryStatuses from '../views/InquiryStatuses/Index.vue';
// import InquirySources from '../views/InquirySources/Index.vue';
// import InquiryFollowupTypes from '../views/InquiryFollowupTypes/Index.vue';
import Inquiries from '../views/Inquiries/Index.vue';
import CreateInquiry from '../views/Inquiries/Create.vue';
import EditInquiry from '../views/Inquiries/Edit.vue';
// import ShowInquiry from '../views/Inquiries/Show.vue';

const inquiryRoutes = [
    // {
    //     path: '/inquiry_statuses',
    //     name: "InquiryStatuses",
    //     component: InquiryStatuses,
    //     meta: {
    //         parent: 'InquiryStatuses'
    //     },
    // },
    // {
    //     path: '/inquiry_follow_up_types',
    //     name: "InquiryFollowupTypes",
    //     component: InquiryFollowupTypes,
    //     meta: {
    //         parent: 'InquiryFollowupTypes'
    //     },
    // },
    // {
    //     path: '/inquiry_sources',
    //     name: "InquirySources",
    //     component: InquirySources,
    //     meta: {
    //         parent: 'InquirySources'
    //     },
    // },
    {
        path: '/inquiries',
        name: "Inquiries",
        component: Inquiries,
        meta: {
            parent: 'Inquiries',
            requiresAuth: true,
        },
        children: [{
            path: '/inquiries/create',
            name: "CreateInquiry",
            component: CreateInquiry,
            meta: {
                parent: 'Inquiries'
            }
        },
            {
                path: '/inquiries/:id/edit',
                name: "EditInquiry",
                component: EditInquiry,
                meta: {
                    parent: 'Inquiries'
                }
            },
            // {
            //     path: '/inquiries/:id',
            //     name: "ShowInquiry",
            //     component: ShowInquiry,
            //     meta: {
            //         parent: 'Inquiries'
            //     }
            // },
        ]
    },
];

export default inquiryRoutes;
