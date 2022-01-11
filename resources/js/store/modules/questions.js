export default {
    actions:{
        async fetchQuestions({ commit }) {
            axios.get('/api/question/list').then(response => {
                commit('LoadQuestions', response.data)
            }).catch((error)=>{
                console.log("fetchQuestions:",error.response);
            });
        },
        async fetchQuestion({ commit }, QuestionId) {
            axios.get('/api/question/show/'+QuestionId).then(response => {
                commit('LoadQuestion', response.data)
            }).catch((error)=>{
                console.log("LoadQuestion:",error.response);
            });
        },
        storeQuestion({ commit }, Question){
            axios.post('/api/question/create',{
                topic_id: Question.topic_id,
                name:Question.name,
                answer:Question.answer,
            }).then(response => {
                commit('CreateQuestion', Question)
            }).catch((error)=>{
                console.log("storeQuestion:",error.response);
            });
        },
        setQuestion({ commit }, Question){
            axios.put('/api/question/update/'+Question.id,{
                topic_id: Question.topic_id,
                name:Question.name,
                answer:Question.answer,
            }).then(response => {
                commit('UpdateQuestion', Question)
            }).catch((error)=>{
                console.log("setQuestion:",error.response);
            });
        },
        delQuestion({ commit }, Question){
            axios.delete('/api/question/delete/'+Question.id).then((response)=>{
                commit('DeleteQuestion', Question)
            }).catch((error)=>{
                console.log("delQuestion:",error.response);
            });
        },
    },
    mutations:{
        LoadQuestions(state, Questions){
            state.Questions = Questions;
        },
        LoadQuestion(state, Question){
            state.Question = Question;
        },
        CreateQuestion(state, Question){
            let index = state.Questions.findIndex(Question => Question.id == id)
            state.Questions.unshift(index)
        },
        UpdateQuestion(state, Question){
            let index = state.Questions.findIndex(p=> p.id === Question.id)
            state.Questions[index] = Question
        },
        DeleteQuestion(state, Question){
            let index = state.Questions.findIndex(Question => Question.id == id)
            state.Questions.splice(index, 1);
        },
    },
    state:{
        Questions:[],
        Question:null,
    },
    getters:{
        GetQuestions(state){
            return state.Questions;
        },
        GetQuestion(state){
            return state.Question;
        }
    }
}