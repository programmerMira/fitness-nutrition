export default {
    actions:{
        async fetchMenuCalories({ commit }) {
            axios.get('/api/menu-calory/list').then(response => {
                commit('LoadMenuCalories', response.data)
            }).catch((error)=>{
                console.log("fetchMenuCalories:",error.response);
            });
        },
        async fetchMenuCalory({ commit }, MenuCaloryId) {
            axios.get('/api/menu-calory/show/'+MenuCaloryId).then(response => {
                commit('LoadMenuCalory', response.data)
            }).catch((error)=>{
                console.log("LoadMenuCalory:",error.response);
            });
        },
        storeMenuCalory({ commit }, MenuCalory){
            axios.post('/api/menu-calory/create',{
                name:MenuCalory.name,
            }).then(response => {
                commit('CreateMenuCalory', MenuCalory)
            }).catch((error)=>{
                console.log("storeMenuCalory:",error.response);
            });
        },
        setMenuCalory({ commit }, MenuCalory){
            axios.put('/api/menu-calory/update/'+MenuCalory.id,{
                name:MenuCalory.name,
            }).then(response => {
                commit('UpdateMenuCalory', MenuCalory)
            }).catch((error)=>{
                console.log("setMenuCalory:",error.response);
            });
        },
        delMenuCalory({ commit }, MenuCalory){
            axios.delete('/api/menu-calory/delete/'+MenuCalory.id).then((response)=>{
                commit('DeleteMenuCalory', MenuCalory)
            }).catch((error)=>{
                console.log("delMenuCalory:",error.response);
            });
        },
    },
    mutations:{
        LoadMenuCalories(state, MenuCalories){
            state.MenuCalories = MenuCalories;
        },
        LoadMenuCalory(state, MenuCalory){
            state.MenuCalory = MenuCalory;
        },
        CreateMenuCalory(state, MenuCalory){
            let index = state.MenuCalories.findIndex(MenuCalory => MenuCalory.id == id)
            state.MenuCalories.unshift(index)
        },
        UpdateMenuCalory(state, MenuCalory){
            let index = state.MenuCalories.findIndex(p=> p.id === MenuCalory.id)
            state.MenuCalories[index] = MenuCalory
        },
        DeleteMenuCalory(state, MenuCalory){
            let index = state.MenuCalories.findIndex(MenuCalory => MenuCalory.id == id)
            state.MenuCalories.splice(index, 1);
        },
    },
    state:{
        MenuCalories:[],
        MenuCalory:null,
    },
    getters:{
        GetMenuCalories(state){
            return state.MenuCalories;
        },
        GetMenuCalory(state){
            return state.MenuCalory;
        }
    }
}