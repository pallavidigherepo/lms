import axiosClient from "@/axios";
import store from "@/stores";

export default {

        async importMe({ commit }, formData) {
            return await axiosClient
                .post(`/imports`, formData, {
                    headers: { 'content-type': 'multipart/form-data' }
                })
        },
        async exportMe({ commit }, payload) {
            return await axiosClient
                .post(`/exports/index`, { data: payload }, { responseType: "blob" })
        },
        async downloadDemo({ commit }, payload) {
            return await axiosClient
                .post(`/exports/demo`, { data: payload }, { responseType: "blob" })
        },
        async listLanguages({ commit }) {
            return await axiosClient
                .get('/languages')
                .then(({ data }) => {
                    commit('SET_LANGUAGES', data)
                    return data;
                })
        },
        async listCourses({ commit }) {
            return await axiosClient
                .get('/courses_list')
                .then(({ data }) => {
                    commit('SET_COURSES_LIST', data)
                    return data;
                })
        },
        async listCourseTypes({ commit }) {
            return await axiosClient
                .get('/course_type_list')
                .then(({ data }) => {
                    commit('SET_COURSES_TYPES_LIST', data)
                    return data;
                })
        },
        async listSubjects({ commit }) {
            return await axiosClient
                .get('/subject_list')
                .then(({ data }) => {
                    commit('SET_SUBJECTS_LIST', data)
                    return data;
                })
        },
        async listBoard({ commit }) {
            return await axiosClient
                .get('/board_list')
                .then(({ data }) => {
                    commit('SET_BOARD_LIST', data)
                    return data;
                })
        },
        async listBatch({ commit }) {
            return await axiosClient
                .get('/batch_list')
                .then(({ data }) => {
                    commit('SET_BATCH_LIST', data)
                    return data;
                })
        },
        async listStandard({ commit }) {
            return await axiosClient
                .get('/standard_list')
                .then(({ data }) => {
                    commit('SET_STANDARD_LIST', data)
                    return data;
                })
        },
        async listDifficultyLevel({ commit }) {
            return await axiosClient
                .get('/difficulty_level_list')
                .then(({ data }) => {
                    commit('SET_DIFFICULTY_LEVEL_LIST', data)
                    return data;
                })
        },
        async listType({ commit }) {
            return await axiosClient
                .get('/type_list')
                .then(({ data }) => {
                    commit('SET_TYPE_LIST', data)
                    return data;
                })
        },
        async listTypeParagraph({ commit }) {
            return await axiosClient
                .get('/type_list_paragraph')
                .then(({ data }) => {
                    commit('SET_TYPE_LIST_PARAGRAPH', data)
                    return data;
                })
        },
        async listInquirySources({ commit }) {
            return await axiosClient
                .get('/inquiry_sources_list')
                .then(({ data }) => {
                    commit('SET_INQUIRY_SOURCES', data)
                    return data;
                })
        },
        async listInquiryFollowupTypes({ commit }) {
            return await axiosClient
                .get('/inquiry_followup_types_list')
                .then(({ data }) => {
                    commit('SET_INQUIRY_FOLLOWUP_TYPES', data)
                    return data;
                })
        },
        async listInquiryAssignees({ commit }) {
            return await axiosClient
                .get('/inquiry_assignees')
                .then(({ data }) => {
                    commit('SET_INQUIRY_ASSIGNEES', data)
                    return data;
                })
        },
        async listInquiryStatus({ commit }) {
            return await axiosClient
                .get('/inquiry_status_list')
                .then(({ data }) => {
                    commit('SET_INQUIRY_STATUS', data)
                    return data;
                })
        },
        async listFeeCategories({ commit }) {
            return await axiosClient
                .get('/fee_category_list')
                .then(({ data }) => {
                    commit('SET_FEE_CATEGORIES_LIST', data)
                    return data;
                })
        },
        async listFeeTypes({ commit }) {
            return await axiosClient
                .get('/fee_type_list')
                .then(({ data }) => {
                    commit('SET_FEE_TYPE_LIST', data)
                    return data;
                })
        },
        async listDocumentTypes({ commit }) {
            return await axiosClient
                .get('/document_types_list')
                .then(({ data }) => {
                    commit('SET_DOCUMENT_TYPE_LIST', data)
                    return data;
                })
        },
        async listStandardSections({ commit }) {
            return await axiosClient
                .get('/standard_section_list')
                .then(({ data }) => {
                    commit('SET_STANDARD_SECTION_LIST', data)
                    return data;
                })
        }
    };

