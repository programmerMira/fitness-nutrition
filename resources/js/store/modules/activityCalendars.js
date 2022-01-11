export default {
    actions:{
        async fetchActivityCalendars({ commit }) {
            axios.get('/api/activity-calendar/list').then(response => {
                commit('LoadActivityCalendars', response.data)
            }).catch((error)=>{
                console.log("fetchActivityCalendars:",error.response);
            });
        },
        async fetchActivityCalendar({ commit }, ActivityCalendarId) {
            axios.get('/api/activity-calendar/show/'+ActivityCalendarId).then(response => {
                commit('LoadActivityCalendar', response.data)
            }).catch((error)=>{
                console.log("LoadActivityCalendar:",error.response);
            });
        },
        storeActivityCalendar({ commit }, ActivityCalendar){
            axios.post('/api/activity-calendar/create',{
                training_user_id:ActivityCalendar.training_user_id,
                day:ActivityCalendar.day,
                is_active: ActivityCalendar.is_active,
            }).then(response => {
                commit('CreateActivityCalendar', ActivityCalendar)
            }).catch((error)=>{
                console.log("storeActivityCalendar:",error.response);
            });
        },
        setActivityCalendar({ commit }, ActivityCalendar){
            axios.put('/api/activity-calendar/update/'+ActivityCalendar.id,{
                training_user_id:ActivityCalendar.training_user_id,
                day:ActivityCalendar.day,
                is_active: ActivityCalendar.is_active,
            }).then(response => {
                commit('UpdateActivityCalendar', ActivityCalendar)
            }).catch((error)=>{
                console.log("setActivityCalendar:",error.response);
            });
        },
        delActivityCalendar({ commit }, ActivityCalendar){
            axios.delete('/api/activity-calendar/delete/'+ActivityCalendar.id).then((response)=>{
                commit('DeleteActivityCalendar', ActivityCalendar)
            }).catch((error)=>{
                console.log("delActivityCalendar:",error.response);
            });
        },
    },
    mutations:{
        LoadActivityCalendars(state, ActivityCalendars){
            state.ActivityCalendars = ActivityCalendars;
        },
        LoadActivityCalendar(state, ActivityCalendar){
            state.ActivityCalendar = ActivityCalendar;
        },
        CreateActivityCalendar(state, ActivityCalendar){
            let index = state.ActivityCalendars.findIndex(ActivityCalendar => ActivityCalendar.id == id)
            state.ActivityCalendars.unshift(index)
        },
        UpdateActivityCalendar(state, ActivityCalendar){
            let index = state.ActivityCalendars.findIndex(p=> p.id === ActivityCalendar.id)
            state.ActivityCalendars[index] = ActivityCalendar
        },
        DeleteActivityCalendar(state, ActivityCalendar){
            let index = state.ActivityCalendars.findIndex(ActivityCalendar => ActivityCalendar.id == id)
            state.ActivityCalendars.splice(index, 1);
        },
    },
    state:{
        ActivityCalendars:[],
        ActivityCalendar:null,
    },
    getters:{
        GetActivityCalendars(state){
            return state.ActivityCalendars;
        },
        GetActivityCalendar(state){
            return state.ActivityCalendar;
        }
    }
}