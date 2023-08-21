const state = {
    profile: {},
};

const getters = {
    profile: (state) => {
        return state.profile;
    },
};

const actions = {
    async getProfile({ commit, dispatch, state }) {
        const response = await fetch("/api/profile");
        const result = await response.json();
        mutations.setProfile(state, result);
    },
};
const mutations = {
    setProfile(state, profile) {
        state.profile = profile;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};
