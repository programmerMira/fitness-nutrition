export default {
    actions:{
        async fetchMenuTypes({ commit }) {
            axios.get('/api/menu-type/list').then(response => {
                commit('LoadMenuTypes', response.data)
            }).catch((error)=>{
                console.log("fetchMenuTypes:",error.response);
            });
        },
        async fetchMenuType({ commit }, MenuTypeId) {
            axios.get('/api/menu-type/show/'+MenuTypeId).then(response => {
                commit('LoadMenuType', response.data)
            }).catch((error)=>{
                console.log("LoadMenuType:",error.response);
            });
        },
        storeMenuType({ commit }, MenuType){
            axios.post('/api/menu-type/create',{
                name:MenuType.name,
            }).then(response => {
                commit('CreateMenuType', MenuType)
            }).catch((error)=>{
                console.log("storeMenuType:",error.response);
            });
        },
        setMenuType({ commit }, MenuType){
            axios.put('/api/menu-type/update/'+MenuType.id,{
                name:MenuType.name,
            }).then(response => {
                commit('UpdateMenuType', MenuType)
            }).catch((error)=>{
                console.log("setMenuType:",error.response);
            });
        },
        delMenuType({ commit }, MenuType){
            axios.delete('/api/menu-type/delete/'+MenuType.id).then((response)=>{
                commit('DeleteMenuType', MenuType)
            }).catch((error)=>{
                console.log("delMenuType:",error.response);
            });
        },
    },
    mutations:{
        LoadMenuTypes(state, MenuTypes){
            state.MenuTypes = MenuTypes;
        },
        LoadMenuType(state, MenuType){
            state.MenuType = MenuType;
        },
        CreateMenuType(state, MenuType){
            let index = state.MenuTypes.findIndex(MenuType => MenuType.id == id)
            state.MenuTypes.unshift(index)
        },
        UpdateMenuType(state, MenuType){
            let index = state.MenuTypes.findIndex(p=> p.id === MenuType.id)
            state.MenuTypes[index] = MenuType
        },
        DeleteMenuType(state, MenuType){
            let index = state.MenuTypes.findIndex(MenuType => MenuType.id == id)
            state.MenuTypes.splice(index, 1);
        },
    },
    state:{
        MenuTypes:[],
        MenuType:null,
    },
    getters:{
        GetMenuTypes(state){
            return state.MenuTypes;
        },
        GetMenuType(state){
            return state.MenuType;
        }
    }
}