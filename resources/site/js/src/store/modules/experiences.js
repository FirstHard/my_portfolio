const state = {
    experiences: [],
};

const getters = {
    experiences: (state) => {
        return state.experiences;
    },
};

const actions = {
    async getExperiences({ commit, dispatch, state }) {
        const response = await fetch("/api/experiences");
        const result = await response.json();
        mutations.setExperiences(state, result);
    },
};
const mutations = {
    setExperiences(state, experiences) {
        state.experiences = experiences;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};
