import Vue from 'vue'
import Vuex from 'vuex'

//#region import modules
import problemZones from './modules/problemZones'
import lifeStyles from './modules/lifeStyles'
import trainingLocations from './modules/trainingLocations'
import menuCalories from './modules/menuCalories'
import menuTypes from './modules/menuType'
import menus from './modules/menus'
import trainings from './modules/trainings'
import questions from './modules/questions'
/*NoUpdateHere*/import personalAccount from './modules/personalAccount'
/*fix for users*/import userMenus from './modules/userMenus'
/*fix for users*/import foodCalendars from './modules/foodCalendars'
/*fix for users*/import trainingUsers from './modules/trainingUsers'
/*fix for users*/import activityCalendars from './modules/activityCalendars'
//#endregion

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        problemZones,
        lifeStyles,
        trainingLocations,
        menuCalories,
        menuTypes,
        personalAccount,
        menus,
        userMenus,
        foodCalendars,
        trainings,
        trainingUsers,
        activityCalendars,
        questions,
    }
})
