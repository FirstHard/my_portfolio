const state = {
    projects: [],
    tags: [],
};

const getters = {
    projects: (state) => {
        return state.projects;
    },
    tags: (state) => {
        return state.tags;
    },
};

const actions = {
    async getProjects({ commit, dispatch, state }) {
        const response = await fetch("/api/projects");
        const result = await response.json();
        mutations.setProjects(state, result);
    },
    async getTags({ commit, dispatch, state }) {
        const response = await fetch("/api/tags");
        const result = await response.json();
        mutations.setTags(state, result);
    },
};
const mutations = {
    setProjects(state, projects) {
        state.projects = projects;
    },
    setTags(state, tags) {
        state.tags = tags;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};
