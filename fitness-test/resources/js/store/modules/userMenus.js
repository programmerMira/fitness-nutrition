export default {
    actions:{
        async fetchUserMenus({ commit }) {
            axios.get('/api/user-menu/list').then(response => {
                commit('LoadUserMenus', response.data)
            }).catch((error)=>{
                console.log("fetchUserMenus:",error.response);
            });
        },/*FIX FOR CURRENT USER*/
        async fetchMenu({ commit }, MenuId) {
            axios.get('/api/user-menu/show/'+MenuId).then(response => {
                commit('LoadMenu', response.data)
            }).catch((error)=>{
                console.log("LoadMenu:",error.response);
            });
        },
        storeMenu({ commit }, UserMenu){
            axios.post('/api/user-menu/create',{
                menu_type_id:UserMenu.menu_type_id,
                menu_calories_id:UserMenu.menu_calories_id,
                menu_content:UserMenu.menu_content,
            }).then(response => {
                commit('CreateMenu', UserMenu)
            }).catch((error)=>{
                console.log("storeMenu:",error.response);
            });
        },
        setMenu({ commit }, UserMenu){
            axios.put('/api/user-menu/update/'+UserMenu.id,{
                menu_type_id:UserMenu.menu_type_id,
                menu_calories_id:UserMenu.menu_calories_id,
                menu_content:UserMenu.menu_content,
            }).then(response => {
                commit('UpdateMenu', UserMenu)
            }).catch((error)=>{
                console.log("setMenu:",error.response);
            });
        },
        delMenu({ commit }, UserMenu){
            axios.delete('/api/user-menu/delete/'+UserMenu.id).then((response)=>{
                commit('DeleteMenu', UserMenu)
            }).catch((error)=>{
                console.log("delMenu:",error.response);
            });
        },
    },
    mutations:{
        LoadUserMenus(state, UserMenus){
            state.UserMenus = UserMenus;
        },
        LoadMenu(state, UserMenu){
            state.UserMenu = UserMenu;
        },
        CreateMenu(state, UserMenu){
            let index = state.UserMenus.findIndex(UserMenu => UserMenu.id == id)
            state.UserMenus.unshift(index)
        },
        UpdateMenu(state, UserMenu){
            let index = state.UserMenus.findIndex(p=> p.id === UserMenu.id)
            state.UserMenus[index] = UserMenu
        },
        DeleteMenu(state, UserMenu){
            let index = state.UserMenus.findIndex(UserMenu => UserMenu.id == id)
            state.UserMenus.splice(index, 1);
        },
    },
    state:{
        UserMenus:[],
        UserMenu:null,
    },
    getters:{
        GetUserMenus(state){
            return state.UserMenus;
        },
        GetMenu(state){
            return state.UserMenu;
        }
    }
}