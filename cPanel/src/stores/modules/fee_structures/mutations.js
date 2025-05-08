export default {
    SET_FEE_STRUCTURES(state, payload) {
        state.fee_structures = payload;
    },

    SET_PAGINATION_LINKS(state, payload) {
        state.pagination = payload;
    },

    CREATE_FEE_STRUCTURE(state, payload) {
        state.fee_structures.data.unshift(payload.fee_structure)
    },
    EDIT_FEE_STRUCTURE(state, payload) {
        state.fee_structure = payload;
    },

    DELETE_FEE_STRUCTURE(state, id) {
        let index = state.fee_structures.data.findIndex(item => item.id === id)
        state.fee_structures.data.splice(index, 1)
    },

    UPDATE_FEE_STRUCTURE(state, payload) {
        let index = state.fee_structures.data.findIndex(item => item.id === payload.fee_structure.id);
        state.fee_structures.data[index] = payload.fee_structure;
    },
};
