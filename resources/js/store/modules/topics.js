export default {
    actions:{
        async fetchTopics({ commit }) {
            axios.get('/api/topic/list').then(response => {
                commit('LoadTopics', response.data)
            }).catch((error)=>{
                console.log("fetchTopics:",error.response);
            });
        },
        async fetchTopic({ commit }, TopicId) {
            axios.get('/api/topic/show/'+TopicId).then(response => {
                commit('LoadTopic', response.data)
            }).catch((error)=>{
                console.log("LoadTopic:",error.response);
            });
        },
        storeTopic({ commit }, Topic){
            axios.post('/api/topic/create',{
                name:Topic.name,
            }).then(response => {
                commit('CreateTopic', Topic)
            }).catch((error)=>{
                console.log("storeTopic:",error.response);
            });
        },
        setTopic({ commit }, Topic){
            axios.put('/api/topic/update/'+Topic.id,{
                name:Topic.name,
            }).then(response => {
                commit('UpdateTopic', Topic)
            }).catch((error)=>{
                console.log("setTopic:",error.response);
            });
        },
        delTopic({ commit }, Topic){
            axios.delete('/api/topic/delete/'+Topic.id).then((response)=>{
                commit('DeleteTopic', Topic)
            }).catch((error)=>{
                console.log("delTopic:",error.response);
            });
        },
    },
    mutations:{
        LoadTopics(state, Topics){
            state.Topics = Topics;
        },
        LoadTopic(state, Topic){
            state.Topic = Topic;
        },
        CreateTopic(state, Topic){
            let index = state.Topics.findIndex(Topic => Topic.id == id)
            state.Topics.unshift(index)
        },
        UpdateTopic(state, Topic){
            let index = state.Topics.findIndex(p=> p.id === Topic.id)
            state.Topics[index] = Topic
        },
        DeleteTopic(state, Topic){
            let index = state.Topics.findIndex(Topic => Topic.id == id)
            state.Topics.splice(index, 1);
        },
    },
    state:{
        Topics:[],
        Topic:null,
    },
    getters:{
        GetTopics(state){
            return state.Topics;
        },
        GetTopic(state){
            return state.Topic;
        }
    }
}