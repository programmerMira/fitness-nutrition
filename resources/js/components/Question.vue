<template>
    <main class="main account-main">
        <header class="account-header question">
            <MenuOffice></MenuOffice>
        </header>
        <section id="account-head" class="question">
            <div class="account-container">
                <div class="account-head__row">
                    <Logout></Logout>
                </div>
            </div>
        </section>
        <section id="question">
            <div v-if="Question" class="account-container">
                <div class="question-tab__container">
                    <div class="question-tab__txt question-tab__txt-container">
                        <h5 class="question-tab__title">
                            {{Question.name}}
                        </h5>
                        <p class="question-tab__prg" v-html="Question.answer">
                        </p>
                        <a href="/question" class="question-tab__link-more">
                            Назад
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<script>
import MenuOffice from "../components/Menu.vue";
//props: object or id? can and better to pass object
export default {
    props: ["question"],
    components: {
        MenuOffice
    },
    data: () => ({
        
    }),
    computed:{
        Question(){
            return this.$store.getters.GetQuestion;
        },
    },
    mounted(){
        this.$store.dispatch('fetchQuestion', this.question);
    },

};
</script>
