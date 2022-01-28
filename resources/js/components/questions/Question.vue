<template>
    <main class="main account-main">
        <header class="account-header question">
            <MenuOffice v-bind:page='question'></MenuOffice>
        </header>
        <section id="account-head" class="question">
            <Logout></Logout>
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
import MenuOffice from "../general/Menu.vue";
export default {
    props: ["question"],
    components: {
        MenuOffice
    },
    data: () => ({
        
    }),
    mounted(){
        this.$loading(true);
        this.$store.dispatch('fetchQuestion', this.question);
    },
    computed:{
        Question(){
            if(this.$store.getters.GetQuestion)
                this.$loading(false);
            return this.$store.getters.GetQuestion;
        },
    },
};
</script>
