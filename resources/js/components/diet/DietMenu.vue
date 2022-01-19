<template>
   <div class="progres-diet__menu">
      <template v-if="UserMenus">
         <div class="scroll__contain">
            <div v-show="show_modal" class="modal modal-video" tabindex="-1" role="dialog"
               aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content modal-video__content">
                     <div class="workout__video">
                        <iframe class="workout-video__embed" width="512" height="288"
                           :src="show_video_link" frameborder="0"
                           allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                           allowfullscreen></iframe>
                     </div>
                  </div>
               </div>
            </div>
            <div v-if="current_day" class="progres-diet__contain">
               <div v-for="(item, index) in current_day.content" :key="index" class="progres-diet__block">
                  <div v-if="item!=null&&item.videos&&item.videos.length>0" class="progres-diet__btn-play">
                     <svg v-on:click="show_video(item.videos)" width="20" height="22" viewBox="0 0 20 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                           d="M18.8049 9.43913C20.124 10.233 20.0891 12.1572 18.742 12.9027L3.89024 21.1213C2.54314 21.8667 0.894223 20.8744 0.92219 19.335L1.23052 2.36373C1.25849 0.824387 2.94236 -0.107432 4.26149 0.686461L18.8049 9.43913Z"
                           fill="white" />
                     </svg>
                  </div>
                  <div v-if="item" class="progres-diet__title">
                     {{item.name}}
                  </div>
                  <div v-if="item" class="progres-diet__list">
                     <div v-for="(dish,index) in item.foods" :key="index" class="progres-diet__item">
                        <div class="progres-diet__txt">
                           {{dish.name}}
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           {{dish.amount}}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="diet-info__block">
               <div class="diet-info__title">
                  Дополнительно в течении дня(супер-фуд):
               </div>
               <ul class="diet-info__list">
                  <li v-for="(item, index) in current_day.info" :key="index" class="diet-info__item" v-html="item"></li>
                  <li class="diet-info__item">
                     Заказать оригинальные продукты и подробное описание каждого есть у нас в магазине. Для наших подписчиков по коду <b>GOODIETS</b> скидка до 42% - <a href="/plugin">оформить заказ</a>
                  </li>
               </ul>
            </div>
         </div>
      </template>
   </div>
</template>
<script>
export default {
   props: ["day","menuId","typeId"],
   data: () => ({
      current_menu: null,
      current_day: null,
      show_video_link: null,
      show_modal: false,
   }),
   mounted(){
      if (userInfo){
         this.$store.dispatch('fetchUserMenus');
      }
   },
   computed:{
      UserMenus(){
         //console.log('this.menuId:',this.menuId);
         //console.log('this.day:',this.day);

         if(!this.menuId)
            return false;
         this.current_menu = this.$store.getters.GetUserMenus.find(element => parseInt(element.menu_id) === parseInt(this.menuId.users_menus.menu_id));
         //console.log('this.current_menu:',this.current_menu);
         if(this.current_menu){
            this.current_day = this.current_menu.days.find(element=>parseInt(element.day_number) === parseInt(this.day) && element.menu_type_id === parseInt(this.typeId));
            //console.log('this.current_day:',this.current_day);
            if(this.current_day)
               return true;
         }
         return false;
      }
   },
   methods:{
      show_video(link){
         if(link[0]!=null)
            this.show_video_link = link[0].link;
            this.show_modal = true;
      }
   }
};
</script>