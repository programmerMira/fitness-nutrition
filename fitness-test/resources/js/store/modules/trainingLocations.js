export default {
    actions:{
        async fetchTrainingLocations({ commit }) {
            axios.get('/api/training-location/list').then(response => {
                commit('LoadTrainingLocations', response.data)
            }).catch((error)=>{
                console.log("fetchTrainingLocations:",error.response);
            });
        },
        async fetchTrainingLocation({ commit }, TrainingLocationId) {
            axios.get('/api/training-location/show/'+TrainingLocationId).then(response => {
                commit('LoadTrainingLocation', response.data)
            }).catch((error)=>{
                console.log("LoadTrainingLocation:",error.response);
            });
        },
        storeTrainingLocation({ commit }, TrainingLocation){
            axios.post('/api/training-location/create',{
                name:TrainingLocation.name,
            }).then(response => {
                commit('CreateTrainingLocation', TrainingLocation)
            }).catch((error)=>{
                console.log("storeTrainingLocation:",error.response);
            });
        },
        setTrainingLocation({ commit }, TrainingLocation){
            axios.put('/api/training-location/update/'+TrainingLocation.id,{
                name:TrainingLocation.name,
            }).then(response => {
                commit('UpdateTrainingLocation', TrainingLocation)
            }).catch((error)=>{
                console.log("setTrainingLocation:",error.response);
            });
        },
        delTrainingLocation({ commit }, TrainingLocation){
            axios.delete('/api/training-location/delete/'+TrainingLocation.id).then((response)=>{
                commit('DeleteTrainingLocation', TrainingLocation)
            }).catch((error)=>{
                console.log("delTrainingLocation:",error.response);
            });
        },
    },
    mutations:{
        LoadTrainingLocations(state, TrainingLocations){
            state.TrainingLocations = TrainingLocations;
        },
        LoadTrainingLocation(state, TrainingLocation){
            state.TrainingLocation = TrainingLocation;
        },
        CreateTrainingLocation(state, TrainingLocation){
            let index = state.TrainingLocations.findIndex(TrainingLocation => TrainingLocation.id == id)
            state.TrainingLocations.unshift(index)
        },
        UpdateTrainingLocation(state, TrainingLocation){
            let index = state.TrainingLocations.findIndex(p=> p.id === TrainingLocation.id)
            state.TrainingLocations[index] = TrainingLocation
        },
        DeleteTrainingLocation(state, TrainingLocation){
            let index = state.TrainingLocations.findIndex(TrainingLocation => TrainingLocation.id == id)
            state.TrainingLocations.splice(index, 1);
        },
    },
    state:{
        TrainingLocations:[],
        TrainingLocation:null,
    },
    getters:{
        GetTrainingLocations(state){
            return state.TrainingLocations;
        },
        GetTrainingLocation(state){
            return state.TrainingLocation;
        }
    }
}