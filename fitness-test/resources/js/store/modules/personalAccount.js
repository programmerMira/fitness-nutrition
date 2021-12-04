export default {
    actions:{
        async fetchPersonalAccount({ commit }, PersonalAccountId) {
            axios.get('/api/personal-account/show/'+PersonalAccountId).then(response => {
                commit('LoadUpdatePersonalAccount', response.data)
            }).catch((error)=>{
                console.log("LoadUpdatePersonalAccount:",error.response);
            });
        },
        /*setPersonalAccount({ commit }, PersonalAccount){
            axios.put('/api/personal-account/update/'+PersonalAccount.id,{
                ,
            }).then(response => {
                commit('LoadUpdatePersonalAccount', PersonalAccount)
            }).catch((error)=>{
                console.log("LoadUpdatePersonalAccount:",error.response);
            });
        },*/
    },
    mutations:{
        LoadUpdatePersonalAccount(state, PersonalAccount){
            state.PersonalAccount = PersonalAccount;
        },
    },
    state:{
        PersonalAccount:null,
    },
    getters:{
        GetPersonalAccount(state){
            return state.PersonalAccount;
        }
    }
}