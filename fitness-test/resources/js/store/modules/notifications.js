export default {
    actions:{
        async fetchNotifications({ commit }) {
            axios.get('/api/notification/list').then(response => {
                commit('LoadNotifications', response.data)
            }).catch((error)=>{
                console.log("fetchNotifications:",error.response);
            });
        },
        async fetchNotification({ commit }, NotificationId) {
            axios.get('/api/notification/show/'+NotificationId).then(response => {
                commit('LoadNotification', response.data)
            }).catch((error)=>{
                console.log("LoadNotification:",error.response);
            });
        },
        storeNotification({ commit }, Notification){
            axios.post('/api/notification/create',{
                'user_id': Notification.user_id,
                'name': Notification.name,
                'description': Notification.description
            }).then(response => {
                commit('CreateNotification', Notification)
            }).catch((error)=>{
                console.log("storeNotification:",error.response);
            });
        },
        setNotification({ commit }, Notification){
            axios.put('/api/notification/update/'+Notification.id,{
                'user_id': Notification.user_id,
                'name': Notification.name,
                'description': Notification.description
            }).then(response => {
                commit('UpdateNotification', Notification)
            }).catch((error)=>{
                console.log("setNotification:",error.response);
            });
        },
        delNotification({ commit }, Notification){
            axios.delete('/api/notification/delete/'+Notification.id).then((response)=>{
                commit('DeleteNotification', Notification)
            }).catch((error)=>{
                console.log("delNotification:",error.response);
            });
        },
    },
    mutations:{
        LoadNotifications(state, Notifications){
            state.Notifications = Notifications;
        },
        LoadNotification(state, Notification){
            state.Notification = Notification;
        },
        CreateNotification(state, Notification){
            let index = state.Notifications.findIndex(Notification => Notification.id == id)
            state.Notifications.unshift(index)
        },
        UpdateNotification(state, Notification){
            let index = state.Notifications.findIndex(p=> p.id === Notification.id)
            state.Notifications[index] = Notification
        },
        DeleteNotification(state, Notification){
            let index = state.Notifications.findIndex(Notification => Notification.id == id)
            state.Notifications.splice(index, 1);
        },
    },
    state:{
        Notifications:[],
        Notification:null,
    },
    getters:{
        GetNotifications(state){
            return state.Notifications;
        },
        GetNotification(state){
            return state.Notification;
        }
    }
}