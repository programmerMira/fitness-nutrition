export default {
    actions:{
        async fetchAccessHistory({ commit }) {
            axios.get('/api/access-history/list').then(response => {
                commit('LoadAccessHistory', response.data)
            }).catch((error)=>{
                console.log("LoadAccessHistory:",error.response);
            });
        },
        storeAccessHistory({ commit }, AccessHistory){
            axios.post('/api/access-history/create',{
                user_id:AccessHistory.user_id,
                activation_date:AccessHistory.activation_date,
                deactivation_date: AccessHistory.deactivation_date,
            }).then(response => {
                commit('LoadAccessHistory', AccessHistory)
            }).catch((error)=>{
                console.log("storeAccessHistory:",error.response);
            });
        },
        setAccessHistory({ commit }, AccessHistory){
            axios.put('/api/access-history/update/'+AccessHistory.id,{
                user_id:AccessHistory.user_id,
                activation_date:AccessHistory.activation_date,
                deactivation_date: AccessHistory.deactivation_date,
            }).then(response => {
                commit('LoadAccessHistory', AccessHistory)
            }).catch((error)=>{
                console.log("setAccessHistory:",error.response);
            });
        },
        delAccessHistory({ commit }, AccessHistory){
            axios.delete('/api/access-history/delete/'+AccessHistory.id).then((response)=>{
                commit('DeleteAccessHistory')
            }).catch((error)=>{
                console.log("delAccessHistory:",error.response);
            });
        },
    },
    mutations:{
        LoadAccessHistory(state, AccessHistory){
            state.AccessHistory = AccessHistory;
        },
        DeleteAccessHistory(state){
            state.AccessHistory = null;
        },
    },
    state:{
        AccessHistory:null,
    },
    getters:{
        GetAccessHistory(state){
            return state.AccessHistory;
        }
    }
}