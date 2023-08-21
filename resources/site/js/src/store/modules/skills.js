const state = {
    skills: [],
};

const getters = {
    skills: (state) => {
        return state.skills;
    },
};

const actions = {
    async getSkills({ commit, dispatch, state }) {
        const response = await fetch("/api/skills");
        const result = await response.json();
        mutations.setSkills(state, result);
    },
};
const mutations = {
    setSkills(state, skills) {
        state.skills = skills;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};
