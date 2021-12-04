export default {
    actions:{
        async fetchTrainings({ commit }) {
            axios.get('/api/training/list').then(response => {
                commit('LoadTrainings', response.data)
            }).catch((error)=>{
                console.log("fetchTrainings:",error.response);
            });
        },
        async fetchTraining({ commit }, TrainingId) {
            axios.get('/api/training/show/'+TrainingId).then(response => {
                commit('LoadTraining', response.data)
            }).catch((error)=>{
                console.log("LoadTraining:",error.response);
            });
        },
        storeTraining({ commit }, Training){
            axios.post('/api/training/create',{
                training_location_id:Training.training_location_id,
                name:Training.name,
                description:Training.description,
                training_days:Training.training_days,
            }).then(response => {
                commit('CreateTraining', Training)
            }).catch((error)=>{
                console.log("storeTraining:",error.response);
            });
        },
        setTraining({ commit }, Training){
            axios.put('/api/training/update/'+Training.id,{
                training_location_id:Training.training_location_id,
                name:Training.name,
                description:Training.description,
                training_days:Training.training_days,
            }).then(response => {
                commit('UpdateTraining', Training)
            }).catch((error)=>{
                console.log("setTraining:",error.response);
            });
        },
        delTraining({ commit }, Training){
            axios.delete('/api/training/delete/'+Training.id).then((response)=>{
                commit('DeleteTraining', Training)
            }).catch((error)=>{
                console.log("delTraining:",error.response);
            });
        },
    },
    mutations:{
        LoadTrainings(state, Trainings){
            state.Trainings = Trainings;
        },
        LoadTraining(state, Training){
            state.Training = Training;
        },
        CreateTraining(state, Training){
            let index = state.Trainings.findIndex(Training => Training.id == id)
            state.Trainings.unshift(index)
        },
        UpdateTraining(state, Training){
            let index = state.Trainings.findIndex(p=> p.id === Training.id)
            state.Trainings[index] = Training
        },
        DeleteTraining(state, Training){
            let index = state.Trainings.findIndex(Training => Training.id == id)
            state.Trainings.splice(index, 1);
        },
    },
    state:{
        Trainings:[],
        Training:null,
    },
    getters:{
        GetTrainings(state){
            return state.Trainings;
        },
        GetTraining(state){
            return state.Training;
        }
    }
}