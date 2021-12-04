export default {
    actions:{
        async fetchMenus({ commit }) {
            axios.get('/api/menu/list').then(response => {
                commit('LoadMenus', response.data)
            }).catch((error)=>{
                console.log("fetchMenus:",error.response);
            });
        },
        async fetchMenu({ commit }, MenuId) {
            axios.get('/api/menu/show/'+MenuId).then(response => {
                commit('LoadMenu', response.data)
            }).catch((error)=>{
                console.log("LoadMenu:",error.response);
            });
        },
        storeMenu({ commit }, Menu){
            axios.post('/api/menu/create',{
                menu_type_id:Menu.menu_type_id,
                menu_calories_id:Menu.menu_calories_id,
                menu_content:Menu.menu_content,
            }).then(response => {
                commit('CreateMenu', Menu)
            }).catch((error)=>{
                console.log("storeMenu:",error.response);
            });
        },
        setMenu({ commit }, Menu){
            axios.put('/api/menu/update/'+Menu.id,{
                menu_type_id:Menu.menu_type_id,
                menu_calories_id:Menu.menu_calories_id,
                menu_content:Menu.menu_content,
            }).then(response => {
                commit('UpdateMenu', Menu)
            }).catch((error)=>{
                console.log("setMenu:",error.response);
            });
        },
        delMenu({ commit }, Menu){
            axios.delete('/api/menu/delete/'+Menu.id).then((response)=>{
                commit('DeleteMenu', Menu)
            }).catch((error)=>{
                console.log("delMenu:",error.response);
            });
        },
    },
    mutations:{
        LoadMenus(state, Menus){
            state.Menus = Menus;
        },
        LoadMenu(state, Menu){
            state.Menu = Menu;
        },
        CreateMenu(state, Menu){
            let index = state.Menus.findIndex(Menu => Menu.id == id)
            state.Menus.unshift(index)
        },
        UpdateMenu(state, Menu){
            let index = state.Menus.findIndex(p=> p.id === Menu.id)
            state.Menus[index] = Menu
        },
        DeleteMenu(state, Menu){
            let index = state.Menus.findIndex(Menu => Menu.id == id)
            state.Menus.splice(index, 1);
        },
    },
    state:{
        Menus:[],
        Menu:null,
    },
    getters:{
        GetMenus(state){
            return state.Menus;
        },
        GetMenu(state){
            return state.Menu;
        }
    }
}