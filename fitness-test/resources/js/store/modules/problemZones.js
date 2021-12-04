export default {
    actions:{
        async fetchProblemZones({ commit }) {
            axios.get('/api/problem-zone/list').then(response => {
                commit('LoadProblemZones', response.data)
            }).catch((error)=>{
                console.log("fetchProblemZones:",error.response);
            });
        },
        async fetchProblemZone({ commit }, ProblemZoneId) {
            axios.get('/api/problem-zone/show/'+ProblemZoneId).then(response => {
                commit('LoadProblemZone', response.data)
            }).catch((error)=>{
                console.log("LoadProblemZone:",error.response);
            });
        },
        storeProblemZone({ commit }, ProblemZone){
            axios.post('/api/problem-zone/create',{
                name:ProblemZone.name,
            }).then(response => {
                commit('CreateProblemZone', ProblemZone)
            }).catch((error)=>{
                console.log("storeProblemZone:",error.response);
            });
        },
        setProblemZone({ commit }, ProblemZone){
            axios.put('/api/problem-zone/update/'+ProblemZone.id,{
                name:ProblemZone.name,
            }).then(response => {
                commit('UpdateProblemZone', ProblemZone)
            }).catch((error)=>{
                console.log("setProblemZone:",error.response);
            });
        },
        delProblemZone({ commit }, ProblemZone){
            axios.delete('/api/problem-zone/delete/'+ProblemZone.id).then((response)=>{
                commit('DeleteProblemZone', ProblemZone)
            }).catch((error)=>{
                console.log("delProblemZone:",error.response);
            });
        },
    },
    mutations:{
        LoadProblemZones(state, ProblemZones){
            state.ProblemZones = ProblemZones;
        },
        LoadProblemZone(state, ProblemZone){
            state.ProblemZone = ProblemZone;
        },
        CreateProblemZone(state, ProblemZone){
            let index = state.ProblemZones.findIndex(ProblemZone => ProblemZone.id == id)
            state.ProblemZones.unshift(index)
        },
        UpdateProblemZone(state, ProblemZone){
            let index = state.ProblemZones.findIndex(p=> p.id === ProblemZone.id)
            state.ProblemZones[index] = ProblemZone
        },
        DeleteProblemZone(state, ProblemZone){
            let index = state.ProblemZones.findIndex(ProblemZone => ProblemZone.id == id)
            state.ProblemZones.splice(index, 1);
        },
    },
    state:{
        ProblemZones:[],
        ProblemZone:null,
    },
    getters:{
        GetProblemZones(state){
            return state.ProblemZones;
        },
        GetProblemZone(state){
            return state.ProblemZone;
        }
    }
}