<template>
   <main class="main account-main">
      <header class="account-header plugin">
         <MenuOffice></MenuOffice>
      </header>
      <section id="account-head" class="plugin">
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
                  <a href="index.html" class="account-head__exit">
                     <svg class="account-head__mob-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.99 11.2413V8.74375H9.99375V6.24375H14.99V3.7475L19.9875 7.495L14.99 11.2425V11.2413ZM12.4925 14.9887H7.495V3.74625L2.5 1.24875H12.4937V4.99625H13.7437V1.24875C13.7437 0.56125 13.1812 0 12.4937 0H1.24875C0.917764 0.000660653 0.600523 0.132437 0.36648 0.36648C0.132437 0.600523 0.000660653 0.917764 0 1.24875L0 15.4637C0 15.9512 0.275 16.3762 0.6875 16.6012L7.495 19.9987V16.2387H12.4925C13.18 16.2387 13.7425 15.6762 13.7425 14.9887V9.99375H12.4925V14.9913V14.9887Z" fill="#FF144A"/>
                     </svg>
                     <span>Выход</span>
                  </a>
               </div>
            </div>
         </div>
      </section>
      <section id="progress" class="plugin">
         <div class="account-container">
            <div class="plugin__container">
               <div class="plugin__row">
                  <div class="progress-block plugin-progress__block">
                     <div class="progress-block__head">
                        <h4 class="plugin-progress__title">
                           Подписка
                        </h4>
                        <h6 class="plugin-progress__status">
                           Активна
                        </h6>
                     </div>
                     <button class="plugin-progress__btn btn-none" type="button" data-toggle="modal"
                        data-target="#subscription">
                        Управлять
                     </button>
                     <img class="plugin-progress__img" src="/images/program.png" alt="">
                     <div class="plugin-progress__svg">
                        <svg width="519" height="426" viewBox="0 0 519 426" fill="none"
                           xmlns="http://www.w3.org/2000/svg">
                           <ellipse opacity="0.13" rx="258.295" ry="245.486"
                              transform="matrix(-0.969532 -0.244963 0.273341 -0.961917 259.527 181.408)"
                              fill="white" />
                        </svg>
                        <svg width="438" height="360" viewBox="0 0 438 360" fill="none"
                           xmlns="http://www.w3.org/2000/svg">
                           <ellipse opacity="0.13" rx="217.512" ry="206.725"
                              transform="matrix(-0.969532 -0.244963 0.273341 -0.961917 218.891 154.008)"
                              fill="white" />
                        </svg>
                     </div>
                  </div>
                  <div class="progress-level plugin-progress__level">
                     <div class="progress-level__title">
                        Любовь
                        <div class="progress-level__mob">
                           1 уровень
                        </div>
                     </div>
                     <div class="level__chart">
                        <svg class="radial-progress" data-percentage="75" viewBox="0 0 86 86">
                           <defs>
                              <linearGradient id="linear" x1="107" y1="0" x2="107" y2="223.469"
                                 gradientUnits="userSpaceOnUse">
                                 <stop stop-color="#AB8EFC" />
                                 <stop offset="0.598958" stop-color="#BB00DA" />
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
               </div>
               <div class="plugin-block__list">
                  <div class="plugin-block__item">
                     <h5 class="plugin-block__title-caps">
                        7 дней
                     </h5>
                     <p class="plugin-block__prg">
                        До отключения <br>доступа
                     </p>
                  </div>
                  <div class="plugin-block__item">
                     <div class="plugin-block__border"></div>
                     <div class="plugin-block__back">
                        <h5 class="plugin-block__title">
                           Попробуй <br> новое меню
                        </h5>
                        <button type="button" data-toggle="modal" data-target="#diet"
                           class="plugin-block__btn btn-none">
                           Подробнее
                        </button>
                     </div>
                     <svg class="plugin-block__svg" width="87" height="219" viewBox="0 0 87 219" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                           d="M42.917 0H37.3022L38.9774 58.5069H32.2318V0H27.2923V58.8684H21.7117V0L16.2552 0.0116631V58.8801H9.62877L11.5248 0H6.38107L0.164193 49.8011C0.164193 49.8011 0 51.6758 0 52.393C0 60.0599 3.59369 66.926 9.18604 71.3858C27.6275 92.0948 15.0344 113.232 15.0462 118.257C15.0569 123.801 15.0569 209.335 15.0569 209.335C15.0687 209.402 15.0344 209.447 15.0462 209.526C15.0569 214.766 19.3152 219 24.5792 219C29.848 219 34.1288 214.742 34.1288 209.526C34.1171 209.447 34.1063 209.402 34.0946 209.335H34.1171C34.1171 209.335 34.1171 124.874 34.1288 118.448C34.1288 112.6 23.4885 88.3172 41.2653 70.2448C41.2771 70.2225 41.3162 70.1661 41.3504 70.1379C45.6878 66.0455 48.5553 60.4049 48.9756 54.0704C49.0098 53.6302 48.9981 52.4951 48.9981 52.4951L42.917 0Z"
                           fill="#BB01DA" fill-opacity="0.05" />
                        <path
                           d="M86.3205 141.239C86.3296 135.592 86.1753 0.0116643 86.1753 0.0116643L83.5338 0C83.5338 0 62 14.2351 62 119.873C78.5411 125.191 71.5813 146.377 70.3286 149.075C70.3286 154.451 70.6853 209.694 70.6853 209.694L70.7426 209.66C70.7235 209.74 70.7044 209.786 70.7044 209.853C70.6853 214.923 74.2038 219.045 78.512 219C82.8203 219.022 86.3387 214.9 86.3196 209.853C86.3379 209.786 86.3379 209.74 86.3196 209.694L86.3288 209.649C86.3296 209.65 86.3296 147.439 86.3205 141.239Z"
                           fill="#BB01DA" fill-opacity="0.05" />
                     </svg>
                  </div>
                  <div class="plugin-block__item">
                     <div class="plugin-block__border"></div>
                     <div class="plugin-block__back">
                        <h5 class="plugin-block__title">
                           Прокачай свои <br> тренировки
                        </h5>
                        <button type="button" data-toggle="modal" data-target="#workout"
                           class="plugin-block__btn btn-none">
                           Подробнее
                        </button>
                        <img class="plugin-block__img" src="/images/plugin/plugin.png" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <SubscriptionModal></SubscriptionModal>
      <WorkoutModal></WorkoutModal>
      <DietModalSimple></DietModalSimple>
      <DietModal></DietModal>
   </main>
</template>
<script>
import SubscriptionModal from "../components/plugin/SubscriptionModal.vue";
import WorkoutModal from "../components/plugin/WorkoutModal.vue";
import DietModal from "../components/plugin/DietModal.vue";
import DietModalSimple from "../components/plugin/DietModalSimple.vue";
import Notifications from "../components/Notifications.vue";
import MenuOffice from "../components/Menu.vue";

export default {
  components: {
   SubscriptionModal,
   WorkoutModal,
   DietModal,
   DietModalSimple,
   MenuOffice,
   Notifications
  },
};
</script>
