import { createStore } from "vuex";

import actions from './actions.js';
import mutations from "./mutations.js";
import getters from "./getters.js";
import states from "./states.js";
import modules from "./modules.js";

const store = createStore({
    modules: modules,
    state: states,
    getters: getters,
    actions: actions,
    mutations: mutations,
});

export default store;
