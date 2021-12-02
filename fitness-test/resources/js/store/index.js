import Vue from 'vue'
import Vuex from 'vuex'

import problemZones from './modules/problemZones'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        problemZones,
    }
})
