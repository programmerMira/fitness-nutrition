<template>
   <main v-if="User" class="main account-main">
      <header class="account-header home">
         <MenuOffice></MenuOffice>
      </header>
      <section id="account-head">
         <div class="account-container">
            <div class="account-head__row">
               <div class="account-search">
                  <input type="text" class="account-search__input" placeholder="Поиск">
                  <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path
                        d="M14.362 9.80581H13.517L13.2176 9.57249C14.2657 8.58737 14.8967 7.30843 14.8967 5.91716C14.8967 2.81489 11.7844 0.300232 7.94476 0.300232C4.10514 0.300232 0.992798 2.81489 0.992798 5.91716C0.992798 9.01944 4.10514 11.5341 7.94476 11.5341C9.66671 11.5341 11.2496 11.0243 12.4689 10.1774L12.7577 10.4194V11.102L18.1053 15.4141L19.6989 14.1265L14.362 9.80581ZM7.94476 9.80581C5.28163 9.80581 3.13186 8.06888 3.13186 5.91716C3.13186 3.76545 5.28163 2.02852 7.94476 2.02852C10.6079 2.02852 12.7577 3.76545 12.7577 5.91716C12.7577 8.06888 10.6079 9.80581 7.94476 9.80581Z"
                        fill="#BEBEBE" />
                  </svg>
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
      </section>
      <section id="progress" class="home">
         <div class="account-container">
            <div class="progress__container">
               <div class="progress__col-first">

                  <div class="progress__row">
                     <div class="progress-level">
                        <div class="progress-level__title">
                           Любовь
                           <div class="progress-level__mob">
                              1 уровень
                           </div>
                        </div>
                        <div class="level__chart">
                           <svg class="radial-progress" data-percentage="75" viewBox="0 0 86 86">
                              <defs>
                                 <linearGradient id="linear" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#FF7E83" />
                                    <stop offset="100%" stop-color="#FF144A" />
                                 </linearGradient>
                              </defs>
                              <circle class="incomplete" cx="43" cy="43" r="35"></circle>
                              <circle class="complete" cx="43" cy="43" r="35" stroke="url(#linear)"></circle>
                           </svg>
                           <div class="progress-level__chart-txt">
                              <p class="progress-level__chart-level">
                                 1 уровень
                              </p>
                              <div class="progress-level__current"></div>
                           </div>
                        </div>
                     </div>
                     <div class="progress-result">
                        <div class="progress-result__title">
                           {{Physics.current_weight - Physics.weight}} кг
                        </div>
                        <div class="progress-result__caption">
                           <span>Мой</span> результат
                           <p class="progress-level__chart-level progress-level__chart-level-mob">
                              1 уровень
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="workout-info__txt-block home">
                     <div class="workout-info__img">
                        <img src="/images/luba.png" />  alt="" />
                     </div>
                     <p>
                         Каждые 10 дней тебе нужно заполнять свои параметры и фото в разделе "Мой прогресс" это поможет нам отслеживать результаты и будет отлично мотивировать тебя! А для ещё большего контроля в проекте есть общая группа с <b>дневниками</b> для ежедневных отчётов. Я систематически проверяю все дневники, подсказываю, исправляю ошибки, ставлю оценки. Многих это очень дисциплинирует! Плюс наличие коллектива девочек с одинаковыми целями, очень мотивирует.
                     </p>
                     <p>
                        Дневник будет открыт 30 дней и доступен для участников марафона!
                     </p>
                     <a href="#" class="workout-info__link">Заполнить дневник</a>
                  </div>
               </div>
               <div class="progress__col-second">
                  <div class="progress-block">
                     <div class="progress-block__svg-elem">
                        <svg width="280" height="322" viewBox="0 0 280 322" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <ellipse opacity="0.13" rx="164.341" ry="156.191" transform="matrix(-0.969532 -0.244963 0.273341 -0.961917 202.027 131.5)" fill="white"/>
                           <ellipse opacity="0.13" rx="138.392" ry="131.529" transform="matrix(-0.969532 -0.244963 0.273341 -0.961917 220.71 114.066)" fill="white"/>
                        </svg>
                     </div>
                     <div class="progress-block__head">
                        <h5 class="progress-block__title">
                           Мой прогресс
                        </h5>
                        <div class="select__wrap">
                           <ul class="default__option">
                              <li class="option selected">
                                 1 уровень
                              </li>
                           </ul>
                           <ul class="select__ul">
                              <li>
                                 1 уровень
                              </li>
                              <li class="disabled">
                                 2 уровень
                                 <svg class="icon" width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                       <path
                                          d="M10.9375 14H3.0625C2.33917 14 1.75 13.4114 1.75 12.6875V6.5625C1.75 5.83858 2.33917 5.25 3.0625 5.25H10.9375C11.6608 5.25 12.25 5.83858 12.25 6.5625V12.6875C12.25 13.4114 11.6608 14 10.9375 14ZM3.0625 6.125C2.82158 6.125 2.625 6.321 2.625 6.5625V12.6875C2.625 12.929 2.82158 13.125 3.0625 13.125H10.9375C11.1784 13.125 11.375 12.929 11.375 12.6875V6.5625C11.375 6.321 11.1784 6.125 10.9375 6.125H3.0625Z"
                                          fill="#BEBEBE" />
                                       <path
                                          d="M10.0625 6.125C9.821 6.125 9.625 5.929 9.625 5.6875V3.5C9.625 2.05275 8.44725 0.875 7 0.875C5.55275 0.875 4.375 2.05275 4.375 3.5V5.6875C4.375 5.929 4.179 6.125 3.9375 6.125C3.696 6.125 3.5 5.929 3.5 5.6875V3.5C3.5 1.56975 5.06975 0 7 0C8.93025 0 10.5 1.56975 10.5 3.5V5.6875C10.5 5.929 10.304 6.125 10.0625 6.125Z"
                                          fill="#BEBEBE" />
                                       <path
                                          d="M6.99992 9.91665C6.3565 9.91665 5.83325 9.3934 5.83325 8.74998C5.83325 8.10656 6.3565 7.58331 6.99992 7.58331C7.64334 7.58331 8.16659 8.10656 8.16659 8.74998C8.16659 9.3934 7.64334 9.91665 6.99992 9.91665ZM6.99992 8.45831C6.83951 8.45831 6.70826 8.58898 6.70826 8.74998C6.70826 8.91098 6.83951 9.04165 6.99992 9.04165C7.16034 9.04165 7.29159 8.91098 7.29159 8.74998C7.29159 8.58898 7.16034 8.45831 6.99992 8.45831Z"
                                          fill="#BEBEBE" />
                                       <path
                                          d="M7 11.6667C6.7585 11.6667 6.5625 11.4707 6.5625 11.2292V9.625C6.5625 9.3835 6.7585 9.1875 7 9.1875C7.2415 9.1875 7.4375 9.3835 7.4375 9.625V11.2292C7.4375 11.4707 7.2415 11.6667 7 11.6667Z"
                                          fill="#BEBEBE" />
                                    </g>
                                    <defs>
                                       <clipPath id="clip0">
                                          <rect width="14" height="14" fill="white" />
                                       </clipPath>
                                    </defs>
                                 </svg>
                              </li>
                              <li class="disabled">
                                 3 уровень
                                 <svg class="icon" width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                       <path
                                          d="M10.9375 14H3.0625C2.33917 14 1.75 13.4114 1.75 12.6875V6.5625C1.75 5.83858 2.33917 5.25 3.0625 5.25H10.9375C11.6608 5.25 12.25 5.83858 12.25 6.5625V12.6875C12.25 13.4114 11.6608 14 10.9375 14ZM3.0625 6.125C2.82158 6.125 2.625 6.321 2.625 6.5625V12.6875C2.625 12.929 2.82158 13.125 3.0625 13.125H10.9375C11.1784 13.125 11.375 12.929 11.375 12.6875V6.5625C11.375 6.321 11.1784 6.125 10.9375 6.125H3.0625Z"
                                          fill="#BEBEBE" />
                                       <path
                                          d="M10.0625 6.125C9.821 6.125 9.625 5.929 9.625 5.6875V3.5C9.625 2.05275 8.44725 0.875 7 0.875C5.55275 0.875 4.375 2.05275 4.375 3.5V5.6875C4.375 5.929 4.179 6.125 3.9375 6.125C3.696 6.125 3.5 5.929 3.5 5.6875V3.5C3.5 1.56975 5.06975 0 7 0C8.93025 0 10.5 1.56975 10.5 3.5V5.6875C10.5 5.929 10.304 6.125 10.0625 6.125Z"
                                          fill="#BEBEBE" />
                                       <path
                                          d="M6.99992 9.91665C6.3565 9.91665 5.83325 9.3934 5.83325 8.74998C5.83325 8.10656 6.3565 7.58331 6.99992 7.58331C7.64334 7.58331 8.16659 8.10656 8.16659 8.74998C8.16659 9.3934 7.64334 9.91665 6.99992 9.91665ZM6.99992 8.45831C6.83951 8.45831 6.70826 8.58898 6.70826 8.74998C6.70826 8.91098 6.83951 9.04165 6.99992 9.04165C7.16034 9.04165 7.29159 8.91098 7.29159 8.74998C7.29159 8.58898 7.16034 8.45831 6.99992 8.45831Z"
                                          fill="#BEBEBE" />
                                       <path
                                          d="M7 11.6667C6.7585 11.6667 6.5625 11.4707 6.5625 11.2292V9.625C6.5625 9.3835 6.7585 9.1875 7 9.1875C7.2415 9.1875 7.4375 9.3835 7.4375 9.625V11.2292C7.4375 11.4707 7.2415 11.6667 7 11.6667Z"
                                          fill="#BEBEBE" />
                                    </g>
                                    <defs>
                                       <clipPath id="clip0">
                                          <rect width="14" height="14" fill="white" />
                                       </clipPath>
                                    </defs>
                                 </svg>
                              </li>
                           </ul>
                           <svg class="select__svg" width="17" height="9" viewBox="0 0 17 9" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                 d="M16.0543 0.602247C16.0544 0.681312 16.0388 0.759609 16.0086 0.832666C15.9783 0.905724 15.934 0.97211 15.878 1.02804L8.45314 8.44784C8.34019 8.56069 8.18701 8.62408 8.02729 8.62408C7.86757 8.62408 7.71439 8.56069 7.60143 8.44784L0.176538 1.02804C0.120587 0.972146 0.0761993 0.905792 0.0459089 0.832759C0.0156185 0.759727 1.86629e-05 0.681447 1.67352e-08 0.602389C-1.86294e-05 0.523332 0.0155444 0.445045 0.0458003 0.371998C0.0760563 0.298951 0.120413 0.232574 0.176337 0.176659C0.232261 0.120743 0.298658 0.0763845 0.371737 0.046113C0.444816 0.0158415 0.523145 0.000250816 0.602253 0.000231743C0.68136 0.000213623 0.759697 0.0157671 0.83279 0.0460043C0.905883 0.0762405 0.972301 0.120569 1.02825 0.176458L8.02709 7.17087L15.0259 0.176458C15.1102 0.0922174 15.2175 0.0348415 15.3344 0.0115919C15.4513 -0.0116568 15.5724 0.000263214 15.6825 0.0458469C15.7926 0.0914307 15.8867 0.16863 15.9529 0.267672C16.0191 0.366714 16.0544 0.48315 16.0543 0.602247Z"
                                 fill="white" />
                           </svg>
                        </div>
                     </div>
                     <ul class="progress-block__steps">
                        <li class="progress-block__step"
                        v-for="tab in tabs"
                        @click="selectedTab = tab.title"
                        :key="tab.title"
                        :class="{ active: selectedTab == tab.title }"
                        >
                        {{ tab.title }} Этап
                        </li>
                     </ul>
                  </div>
                  <HomeData :selectedTab="selectedTab"></HomeData>
               </div>
            </div>
         </div>
      </section>
   </main>
</template>
<script>
import HomeData from "./home/HomeData.vue";
import MenuOffice from "../components/Menu.vue";
import Notifications from "../components/Notifications.vue";

export default {
  components: {
   HomeData,
   MenuOffice,
   Notifications
  },
  data: () => ({
      tabs: [
      {
        title: "1",
      },
      {
        title: "2",
      },
      {
        title: "3",
      },
    ],
    selectedTab: "1",
  }),
  computed:{
     User(){
        return this.$store.getters.GetPersonalAccount;
     },
     ActivityCalendar(){
        return this.$store.getters.GetActivityCalendars;
     }
  },
  mounted(){
      if (userInfo){
         this.$store.dispatch('fetchPersonalAccount');
         this.$store.dispatch('fetchActivityCalendars');
      }
   },
  methods: {
   selectTab() {
      this.selectedTab = this.tab.title;
   },
   logout() {
      axios.post('/logout').then(response => {
         this.$router.push("/")
      }).catch(error => {
         location.reload();
      });
   }
  },
};
</script>
