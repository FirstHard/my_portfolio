import { createStore } from "vuex";
import Vuex from 'vuex';

import about from "./modules/about";
import profile from "./modules/profile";
import skills from "./modules/skills";
import experiences from "./modules/experiences";
import projects from "./modules/projects";
// import tags from "./modules/tags";
const store = createStore({
    modules: {
        about,
        profile,
        skills,
        experiences,
        projects,
        // tags,
    },
});

export default store;
