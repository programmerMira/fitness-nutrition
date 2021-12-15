export default {
    actions:{
        async fetchPhysicsParameters({ commit }) {
            axios.get('/api/physics-parameter/list').then(response => {
                commit('LoadPhysicsParameters', response.data)
            }).catch((error)=>{
                console.log("fetchPhysicsParameters:",error.response);
            });
        },
        async fetchPhysicsParameter({ commit }, PhysicsParameterId) {
            axios.get('/api/physics-parameter/show/'+PhysicsParameterId).then(response => {
                commit('LoadPhysicsParameter', response.data)
            }).catch((error)=>{
                console.log("LoadPhysicsParameter:",error.response);
            });
        },
        storePhysicsParameter({ commit }, PhysicsParameter){
            axios.post('/api/physics-parameter/create',{
                'user_id': PhysicsParameter.user_id,
                'weight': PhysicsParameter.weight,
                'height': PhysicsParameter.height,
                'dream_weight': PhysicsParameter.dream_weight,
                'hips_cm': PhysicsParameter.hips_cm,
                'waist_cm': PhysicsParameter.waist_cm,
                'chest_cm': PhysicsParameter.chest_cm
            }).then(response => {
                commit('CreatePhysicsParameter', PhysicsParameter)
            }).catch((error)=>{
                console.log("storePhysicsParameter:",error.response);
            });
        },
        setPhysicsParameter({ commit }, PhysicsParameter){
            axios.put('/api/physics-parameter/update/'+PhysicsParameter.id,{
                'user_id': PhysicsParameter.user_id,
                'weight': PhysicsParameter.weight,
                'height': PhysicsParameter.height,
                'dream_weight': PhysicsParameter.dream_weight,
                'hips_cm': PhysicsParameter.hips_cm,
                'waist_cm': PhysicsParameter.waist_cm,
                'chest_cm': PhysicsParameter.chest_cm
            }).then(response => {
                commit('UpdatePhysicsParameter', PhysicsParameter)
            }).catch((error)=>{
                console.log("setPhysicsParameter:",error.response);
            });
        },
        delPhysicsParameter({ commit }, PhysicsParameter){
            axios.delete('/api/physics-parameter/delete/'+PhysicsParameter.id).then((response)=>{
                commit('DeletePhysicsParameter', PhysicsParameter)
            }).catch((error)=>{
                console.log("delPhysicsParameter:",error.response);
            });
        },
    },
    mutations:{
        LoadPhysicsParameters(state, PhysicsParameters){
            state.PhysicsParameters = PhysicsParameters;
        },
        LoadPhysicsParameter(state, PhysicsParameter){
            state.PhysicsParameter = PhysicsParameter;
        },
        CreatePhysicsParameter(state, PhysicsParameter){
            let index = state.PhysicsParameters.findIndex(PhysicsParameter => PhysicsParameter.id == id)
            state.PhysicsParameters.unshift(index)
        },
        UpdatePhysicsParameter(state, PhysicsParameter){
            let index = state.PhysicsParameters.findIndex(p=> p.id === PhysicsParameter.id)
            state.PhysicsParameters[index] = PhysicsParameter
        },
        DeletePhysicsParameter(state, PhysicsParameter){
            let index = state.PhysicsParameters.findIndex(PhysicsParameter => PhysicsParameter.id == id)
            state.PhysicsParameters.splice(index, 1);
        },
    },
    state:{
        PhysicsParameters:[],
        PhysicsParameter:null,
    },
    getters:{
        GetPhysicsParameters(state){
            return state.PhysicsParameters;
        },
        GetPhysicsParameter(state){
            return state.PhysicsParameter;
        }
    }
}