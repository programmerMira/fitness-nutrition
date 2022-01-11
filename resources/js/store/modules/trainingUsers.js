export default {
    actions:{
        async fetchTrainingUsers({ commit }) {
            axios.get('/api/training-user/list').then(response => {
                commit('LoadTrainingUsers', response.data)
            }).catch((error)=>{
                console.log("fetchTrainingUsers:",error.response);
            });
        },
        async fetchTrainingUser({ commit }, TrainingUserId) {
            axios.get('/api/training-user/show/'+TrainingUserId).then(response => {
                commit('LoadTrainingUser', response.data)
            }).catch((error)=>{
                console.log("LoadTrainingUser:",error.response);
            });
        },
        storeTrainingUser({ commit }, TrainingUser){
            axios.post('/api/training-user/create',{
                user_id:TrainingUser.user_id,
                training_id:TrainingUser.training_id,
            }).then(response => {
                commit('CreateTrainingUser', TrainingUser)
            }).catch((error)=>{
                console.log("storeTrainingUser:",error.response);
            });
        },
        setTrainingUser({ commit }, TrainingUser){
            axios.put('/api/training-user/update/'+TrainingUser.id,{
                user_id:TrainingUser.user_id,
                training_id:TrainingUser.training_id,
            }).then(response => {
                commit('UpdateTrainingUser', TrainingUser)
            }).catch((error)=>{
                console.log("setTrainingUser:",error.response);
            });
        },
        delTrainingUser({ commit }, TrainingUser){
            axios.delete('/api/training-user/delete/'+TrainingUser.id).then((response)=>{
                commit('DeleteTrainingUser', TrainingUser)
            }).catch((error)=>{
                console.log("delTrainingUser:",error.response);
            });
        },
    },
    mutations:{
        LoadTrainingUsers(state, TrainingUsers){
            state.TrainingUsers = TrainingUsers;
        },
        LoadTrainingUser(state, TrainingUser){
            state.TrainingUser = TrainingUser;
        },
        CreateTrainingUser(state, TrainingUser){
            let index = state.TrainingUsers.findIndex(TrainingUser => TrainingUser.id == id)
            state.TrainingUsers.unshift(index)
        },
        UpdateTrainingUser(state, TrainingUser){
            let index = state.TrainingUsers.findIndex(p=> p.id === TrainingUser.id)
            state.TrainingUsers[index] = TrainingUser
        },
        DeleteTrainingUser(state, TrainingUser){
            let index = state.TrainingUsers.findIndex(TrainingUser => TrainingUser.id == id)
            state.TrainingUsers.splice(index, 1);
        },
    },
    state:{
        TrainingUsers:[],
        TrainingUser:null,
    },
    getters:{
        GetTrainingUsers(state){
            return state.TrainingUsers;
        },
        GetTrainingUser(state){
            return state.TrainingUser;
        }
    }
}