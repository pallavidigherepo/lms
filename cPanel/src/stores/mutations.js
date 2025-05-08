export default {
    SET_LANGUAGES(state, payload) {
        state.languages = payload;
    },
    SET_COURSES_LIST(state, payload) {
        state.courseList = payload;
    },
    SET_COURSES_TYPES_LIST(state, payload) {
        state.courseTypeList = payload;
    },
    SET_SUBJECTS_LIST(state, payload) {
        state.subjectList = payload;
    },
    SET_BOARD_LIST(state, payload) {
        state.boardList = payload;
    },
    SET_BATCH_LIST(state, payload) {
        state.batchList = payload;
    },
    SET_STANDARD_LIST(state, payload) {
        state.standardList = payload;
    },
    SET_STANDARD_SECTION_LIST(state, payload) {
        state.standardSectionList = payload;
    },
    SET_DIFFICULTY_LEVEL_LIST(state, payload) {
        state.difficultyList = payload;
    },
    SET_TYPE_LIST(state, payload) {
        state.typeList = payload;
    },
    SET_TYPE_LIST_PARAGRAPH(state, payload) {
        state.typeListParagraph = payload;
    },
    SET_INQUIRY_SOURCES(state, payload) {
        state.inquirySources = payload;
    },
    SET_INQUIRY_FOLLOWUP_TYPES(state, payload) {
        state.inquiryFollowupTypes = payload;
    },
    SET_INQUIRY_ASSIGNEES(state, payload) {
        state.inquiryAssignees = payload;
    },
    SET_INQUIRY_STATUS(state, payload) {
        state.inquiryStatus = payload;
    },
    SET_FEE_CATEGORIES_LIST(state, payload) {
        state.feeCategories = payload;
    },
    SET_FEE_TYPE_LIST(state, payload) {
        state.feeTypesList = payload;
    },
    SET_DOCUMENT_TYPE_LIST(state, payload) {
        state.documentTypesList = payload;
    }
};
