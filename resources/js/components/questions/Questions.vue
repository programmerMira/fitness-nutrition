<template>
<main class="main account-main">
    <header class="account-header question">
      <MenuOffice v-bind:page='question'></MenuOffice>
    </header>
    <section id="account-head" class="question">
      <Logout></Logout>
    </section>
   <section id="question">
      <div class="account-container">
         <div id="progress" class="question question__container">
            <div class="question-tab">
               <div v-if="!search_flag" class="question-tab__btns">
                  <button v-for="(topic) in Topics" :key="topic.id" :class="show(topic.id)" :data-id="topic.id" v-on:click="currentTab=topic.id">
                     {{topic.name}}
                     <svg width="14" height="24" viewBox="0 0 14 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                           d="M1.83798 0.75C1.62365 0.749928 1.41382 0.812479 1.23501 0.930153C1.05612 1.04787 0.91613 1.21563 0.833318 1.41261C0.750488 1.60963 0.728769 1.82665 0.771065 2.03605C0.813355 2.24543 0.917627 2.43723 1.0701 2.58739L10.6217 12.0001L1.07004 21.4129L1.07 21.4129C0.968854 21.5126 0.888432 21.6312 0.833507 21.762C0.778579 21.8927 0.750276 22.033 0.750309 22.1748C0.750342 22.3165 0.778715 22.4568 0.833704 22.5875C0.888691 22.7182 0.969167 22.8368 1.07036 22.9365C1.17155 23.0361 1.29147 23.115 1.42318 23.1687C1.55488 23.2224 1.69591 23.25 1.83824 23.25C1.98057 23.25 2.12159 23.2223 2.25327 23.1685C2.38494 23.1147 2.5048 23.0358 2.60593 22.9361C2.60594 22.9361 2.60596 22.9361 2.60597 22.9361L12.9302 12.7615L12.9303 12.7614C13.1346 12.5601 13.25 12.2862 13.25 11.9998C13.25 11.7135 13.1346 11.4396 12.9303 11.2382L12.9302 11.2382L2.60593 1.06351L2.60587 1.06345C2.50466 0.963781 2.38473 0.884928 2.253 0.831215C2.1213 0.777515 1.98029 0.74995 1.83798 0.75ZM1.83798 0.75C1.83802 0.75 1.83806 0.75 1.8381 0.75L1.83798 1L1.83787 0.75C1.83791 0.75 1.83795 0.75 1.83798 0.75Z"
                           fill="#FF3E13" stroke="#FF3E13" stroke-width="0.5" />
                     </svg>
                  </button>
                  <div class="question-tab__social-txt">
                     <b>
                        Остались вопросы?
                     </b>
                     <p>
                        Найдите ответ на свой вопрос в разделе <a href="#">помощь</a> или напишите в наш <a href="#">телеграм-чат</a>
                     </p>
                  </div>
               </div>
               <div class="question-tab__body">
                  <div v-for="(topic) in Topics" :key="topic.id" :class="showQ(topic.id)" :id="topic.id">
                      <div v-for="question in QuestionsForTopic" :key="question.id" class="question-tab__txt">
                          <h5 class="question-tab__title">
                              {{question.name}}
                          </h5>
                          <p class="question-tab__prg text-overflow__custom" v-html="question.answer">
                          </p>
                          <a :href="'/article/'+question.id" class="question-tab__link-more">
                              Подробнее
                          </a>
                      </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
</template>
<script>
import MenuOffice from "../general/Menu.vue";
import Logout from "../general/Logout.vue";
export default {
   props:["search_flag", "questions"],
   components: {
      MenuOffice,
      Logout
   },
   data: () => ({
         currentTab: "1",
   }),
   computed:{
      QuestionsForTopic(){
         if(!this.search_flag)
            return this.$store.getters.GetQuestions.filter(
               question => question.topic_id === parseInt(this.currentTab)
            );
         else
            return this.questions;
      },
      Topics(){
         if(this.$store.getters.GetTopics)
            this.$loading(false);
         return this.$store.getters.GetTopics;
      }
   },
   mounted(){
      this.$loading(true);
      this.$store.dispatch('fetchQuestions');
      this.$store.dispatch('fetchTopics');
   },
   methods:{
      show(item){
         if(item===parseInt(this.currentTab))
            return 'question-tab__btn active';
         return 'question-tab__btn';
      },
      showQ(item){
         if(item===parseInt(this.currentTab))
            return 'question-tab__content active';
         return 'question-tab__content';
      }
   }
};
</script>
<style lang="scss">
   .text-overflow__custom{
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
   }
</style>