import FeeTypes from '../views/FeeTypes/Index.vue';
import FeeCategories from '../views/FeeCategories/Index.vue';
import FeeDiscounts from '../views/FeeDiscounts/Index.vue';
import FeeStructures from '../views/FeeStructures/Index.vue';
import Fees from '../views/Fees/Index.vue';


const feeRoutes = [
    {
        path: '/fee_types',
        name: "FeeTypes",
        component: FeeTypes,
    },
    {
        path: '/fee_categories',
        name: "FeeCategories",
        component: FeeCategories,
    },
    {
        path: '/fee_discounts',
        name: "FeeDiscounts",
        component: FeeDiscounts,
    },
    {
        path: '/fee_structures',
        name: "FeeStructures",
        component: FeeStructures,
    },
    {
        path: '/fees',
        name: "Fees",
        component: Fees,
        /*children: [{

        }]*/
    }
];

export default feeRoutes;
