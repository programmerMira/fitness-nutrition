<template>
<div class="account-container">
    <div class="account-head__row">
        <div class="account-search">
            <form @submit = "onSubmit">
                <input v-model="search_text" type="text" class="account-search__input" placeholder="Поиск">
                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.362 9.80581H13.517L13.2176 9.57249C14.2657 8.58737 14.8967 7.30843 14.8967 5.91716C14.8967 2.81489 11.7844 0.300232 7.94476 0.300232C4.10514 0.300232 0.992798 2.81489 0.992798 5.91716C0.992798 9.01944 4.10514 11.5341 7.94476 11.5341C9.66671 11.5341 11.2496 11.0243 12.4689 10.1774L12.7577 10.4194V11.102L18.1053 15.4141L19.6989 14.1265L14.362 9.80581ZM7.94476 9.80581C5.28163 9.80581 3.13186 8.06888 3.13186 5.91716C3.13186 3.76545 5.28163 2.02852 7.94476 2.02852C10.6079 2.02852 12.7577 3.76545 12.7577 5.91716C12.7577 8.06888 10.6079 9.80581 7.94476 9.80581Z"
                        fill="#BEBEBE" />
                </svg>
            </form>
        </div>
        <div class="account-head__mob-row">
        <Notifications></Notifications>
        <a v-on:click="logout()" class="account-head__exit">
            <svg class="account-head__mob-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.99 11.2413V8.74375H9.99375V6.24375H14.99V3.7475L19.9875 7.495L14.99 11.2425V11.2413ZM12.4925 14.9887H7.495V3.74625L2.5 1.24875H12.4937V4.99625H13.7437V1.24875C13.7437 0.56125 13.1812 0 12.4937 0H1.24875C0.917764 0.000660653 0.600523 0.132437 0.36648 0.36648C0.132437 0.600523 0.000660653 0.917764 0 1.24875L0 15.4637C0 15.9512 0.275 16.3762 0.6875 16.6012L7.495 19.9987V16.2387H12.4925C13.18 16.2387 13.7425 15.6762 13.7425 14.9887V9.99375H12.4925V14.9913V14.9887Z" fill="#FF144A"/>
            </svg>
            <span>Выход</span>
        </a>
        </div>
    </div>
</div>
</template>
<script>
import Notifications from "./Notifications.vue";
export default {
    components: {
        Notifications
    },
    data: () =>({
        search_text: ""
    }),
    methods:{
        logout() {
            this.$loading(true);
            axios.post('/logout').then(response => {
                this.$router.push("/")
            }).catch(error => {
                location.reload();
            });
            this.$loading(false);
        },
        onSubmit(){
            axios.post('/searchQuestions',{
                question: this.search_text
            }).then(response => {
                console.log("response: ", response.data)
                //this.$router.push({ path: '/search', params: { question: response.data } })
            }).catch(error => {
                console.log("error: ",error);
                //location.reload();
            });
        }
    }
}
</script>