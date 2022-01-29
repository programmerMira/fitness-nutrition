export default {
    actions:{
        async fetchPricings({ commit }) {
            axios.get('/api/pricing/list').then(response => {
                commit('LoadPricings', response.data)
            }).catch((error)=>{
                console.log("fetchPricings:",error.response);
            });
        },
        async fetchPricing({ commit }, PricingId) {
            axios.get('/api/pricing/show/'+PricingId).then(response => {
                commit('LoadPricing', response.data)
            }).catch((error)=>{
                console.log("LoadPricing:",error.response);
            });
        },
        storePricing({ commit }, Pricing){
            axios.post('/api/pricing/create',{
                month:Pricing.month,
                number:Pricing.number,
                price:Pricing.price,
                discount: Pricing.discount,
            }).then(response => {
                commit('CreatePricing', Pricing)
            }).catch((error)=>{
                console.log("storePricing:",error.response);
            });
        },
        setPricing({ commit }, Pricing){
            axios.put('/api/pricing/update/'+Pricing.id,{
                month:Pricing.month,
                number:Pricing.number,
                price:Pricing.price,
                discount: Pricing.discount,
            }).then(response => {
                commit('UpdatePricing', Pricing)
            }).catch((error)=>{
                console.log("setPricing:",error.response);
            });
        },
        delPricing({ commit }, Pricing){
            axios.delete('/api/pricing/delete/'+Pricing.id).then((response)=>{
                commit('DeletePricing', Pricing)
            }).catch((error)=>{
                console.log("delPricing:",error.response);
            });
        },
    },
    mutations:{
        LoadPricings(state, Pricings){
            state.Pricings = Pricings;
        },
        LoadPricing(state, Pricing){
            state.Pricing = Pricing;
        },
        CreatePricing(state, Pricing){
            let index = state.Pricings.findIndex(Pricing => Pricing.id == id)
            state.Pricings.unshift(index)
        },
        UpdatePricing(state, Pricing){
            let index = state.Pricings.findIndex(p=> p.id === Pricing.id)
            state.Pricings[index] = Pricing
        },
        DeletePricing(state, Pricing){
            let index = state.Pricings.findIndex(Pricing => Pricing.id == id)
            state.Pricings.splice(index, 1);
        },
    },
    state:{
        Pricings:[],
        Pricing:null,
    },
    getters:{
        GetPricings(state){
            return state.Pricings;
        },
        GetPricing(state){
            return state.Pricing;
        }
    }
}