const state = {
    about: {},
};

const getters = {
    about: (state) => {
        return state.about;
    },
};

const actions = {
    async getAbout({ commit, dispatch, state }) {
        const response = await fetch("/api/about");
        const result = await response.json();
        mutations.setAbout(state, result);
    },
};
const mutations = {
    setAbout(state, about) {
        state.about = about;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};
