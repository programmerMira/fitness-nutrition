<template>
  <main class="main account-main">
         <header class="account-header diet">
            <MenuOffice></MenuOffice>
         </header>
         <section id="account-head" class="diet">
            <Logout></Logout>
         </section>
         <section v-if="User" id="progress" class="diet">
            <div class="account-container">
               <div class="progress__container">
               <div class="progress__col-first">
                  <div class="progress__row">
                     <div class="progress-level">
                        <div class="progress-level__title">
                           {{User.user.name}}
                           <div v-if="UserTrainings" class="progress-level__mob">{{UserTrainings.training.level}} уровень</div>
                        </div>
                        <div class="level__chart">
                           <svg class="radial-progress" :data-percentage="findPercent()" viewBox="0 0 86 86">
                              <defs>
                                 <linearGradient id="linear" x1="46.2954" y1="0" x2="46.2954" y2="99.0139"
                                    gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#A697FF" />
                                    <stop offset="1" stop-color="#573DFF" />
                                 </linearGradient>
                              </defs>
                              <circle class="incomplete" cx="43" cy="43" r="35"></circle>
                              <circle class="complete" cx="43" cy="43" r="35" stroke="url(#linear)"></circle>
                              <circle class="incomplete incomplete-mob" cx="43" cy="43" r="35"></circle>
                              <circle class="complete complete-mob" cx="43" cy="43" r="35" stroke="url(#linear)">
                              </circle>
                           </svg>
                           <div class="progress-level__chart-txt">
                              <p v-if="UserTrainings" class="progress-level__chart-level">{{UserTrainings.training.level}} уровень</p>
                              <div class="progress-level__current"></div>
                           </div>
                        </div>
                     </div>
                     <div class="progress-result">
                      <div v-if="Physics" class="progress-result__title">{{Physics.current_weight - Physics.weight}} кг</div>
                      <div class="progress-result__caption">
                        <span>Мой</span> результат
                        <p v-if="UserTrainings" class="progress-level__chart-level progress-level__chart-level-mob">
                            {{UserTrainings.training.level}} уровень
                        </p>
                      </div>
                     </div>
                  </div>
                     <div class="calendar diet">
                     <div class="calendar__container">
                        <div v-if="MenuTitleAndDays.length>0" class="calendar__slider-diet">
                           <div class="swiper-wrapper">
                              <div class="swiper-slide" v-for="(tabs, index) in MenuTitleAndDays" :key="index">
                                 <div class="calendar__title">
                                    <span>Календарь питания</span> <h5>{{ tabs.menutitle }}</h5>
                                 </div>
                                 <div class="calendar__days">
                                    <div
                                    class="calendar__day"
                                    v-for="(tab, index) in tabs.days" 
                                    :key="index"
                                    v-on:click = "changeTabSelection(tab.title)"
                                    :class="changeTabStyle(tab.title)"
                                    >
                                    <span>{{ tab.title }}</span>
                                    </div>
                                 </div>
                              </div>
                           </div> 
                           <div class="calendar__slider-diet-pagination">
                              <div class="swiper-button-next"></div>
                              <div class="swiper-button-prev"></div>
                           </div>
                        </div> 
                     </div>
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
                     <div v-on:click="show_types()" class="progress-block__head">
                        <h5 class="progress-block__title">
                           План питания
                        </h5>
                        <div class="select__wrap">
                           <ul class="default__option">
                              <li class="option selected">
                                 Разнообразное меню
                              </li>
                           </ul>
                           <ul :style="show_select_types? 'display: block !important; z-index:1000;': 'display: none !important'" class="select__ul">
                              <li>
                                 Разнообразное меню
                              </li>
                              <li>
                                 Простое меню
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
                     <ul v-if="UserMenu" class="progress-block__steps progress-diet__plan-list">
                        <li class="progress-diet__plan-item">
                           Белки
                           <b>
                              {{UserMenu.menu.proteins}} гр
                           </b>
                        </li>
                        <li class="progress-diet__plan-item">
                           Жиры
                           <b>
                              {{UserMenu.menu.fat}} гр
                           </b>
                        </li>
                        <li class="progress-diet__plan-item">
                           Углеводы
                           <b>
                              {{UserMenu.menu.carbs}} гр
                           </b>
                        </li>
                     </ul>
                  </div>
                     <DietMenu :day="selectedTab" :menuId="selectedMenuId"></DietMenu>
               </div>
            </div>
               <DietModal></DietModal>
               <DietModalSimple></DietModalSimple>
            </div>
         </section>
      </main>
</template>
<script>
import DietMenu from "./DietMenu.vue";
import Calendar from "../general/Calendar.vue";
import DietModal from "../plugin/DietModal.vue";
import DietModalSimple from "../plugin/DietModalSimple.vue";
import MenuOffice from "../general/Menu.vue";
import Logout from "../general/Logout.vue";

export default {
  components: {
    DietMenu,
    DietModalSimple,
    Calendar,
    MenuOffice,
    DietModal,
    Logout
  },
  data: () => ({
      slider: [],
      selectedTab: null,
      show_select_types:false,
      selectedMenuId:null,
   }),
   computed:{
      User(){
         return this.$store.getters.GetPersonalAccount;
      },
      selectedTrainingId(){
         return this.$store.getters.GetActivityCalendars.find(element=>parseInt(element.is_active)==1);
      },
      UserTrainings(){
         if(this.selectedTrainingId)
            return this.$store.getters.GetTrainingUsers.find(element => parseInt(element.training_id) === parseInt(this.selectedTrainingId.training_user.training_id));
      },
      UserMenu(){
         console.log("usersmenus:",this.$store.getters.GetUserMenus);
         if(this.selectedMenuId)
            return this.$store.getters.GetUserMenus.find(element=>element.menu_id === this.selectedMenuId.users_menus.menu_id);
      },
      Physics(){
         if(this.selectedTrainingId){
            let tmp = this.$store.getters.GetPhysicsParameters.filter(element => element.training_id == this.selectedTrainingId.training_user.training_id);
            if(tmp)
               return tmp[tmp.length-1];
         }
      },
      UserFoodCallendar(){
         //console.log("UserFoodCallendar:",this.$store.getters.GetFoodCalendars.find(element=>parseInt(element.is_active)==1))
         return this.$store.getters.GetFoodCalendars.find(element=>parseInt(element.is_active)==1);
      },
      MenuTitleAndDays(){
         let tmp = this.$store.getters.GetUserMenus;
         if(!tmp||tmp.length<1)
            return this.slider;
         if(this.$store.getters.GetFoodCalendars!=null)
            this.selectedMenuId = this.UserFoodCallendar;
         else
            this.selectedMenuId = tmp[0];
         if(this.selectedMenuId)
            this.selectedTab = this.selectedMenuId.day.toString();
         else
            this.selectedTab = "1";
         this.slider = [];
         tmp.forEach(item=>{
            let days=[];
            item.days.forEach(day=>days.push({title: day.day_number}));
            this.slider.push(
               {
                  menutitle: item.menu.menu_content,
                  days: days
               }
            );
         });
         console.log("this.slider: ",this.slider);
         console.log("this.selectedMenuId:",this.selectedMenuId);
         return this.slider;
      },
   },
   mounted(){
      if(userInfo){
         this.$store.dispatch('fetchPersonalAccount');
         this.$store.dispatch('fetchPhysicsParameters');
         this.$store.dispatch('fetchTrainingUsers');
         this.$store.dispatch('fetchUserMenus');
         this.$store.dispatch('fetchFoodCalendars');
         this.$store.dispatch('fetchActivityCalendars');
      }
   },
   methods: {
      findPercent()
      {
         if(this.UserTrainings==null)
            return 0;
         var date1 = new Date(this.UserTrainings.created_at);
         var date2 = new Date();
         var Difference_In_Time = date2.getTime() - date1.getTime();
         var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
         var percent = (Difference_In_Days*100)/30;
         return parseInt(percent);
      },
      show_types(){
         this.show_select_types=!this.show_select_types;
      },
      changeTabSelection(tabTitle){
         this.$store.dispatch('setFoodCalendar',{
            id: this.UserFoodCallendar.id,
            users_menus_id: this.UserFoodCallendar.users_menus_id,
            day: parseInt(tabTitle),
            is_active: this.UserFoodCallendar.is_active
         });
         
         this.selectedTab = tabTitle;
      },
      changeTabStyle(tabTitle){
         if(this.selectedTab!=null&&this.selectedTab.toString()==tabTitle)
            return 'active';
      },
   },
};
</script>