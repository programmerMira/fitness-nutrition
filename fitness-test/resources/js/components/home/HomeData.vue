<template>
   <div class="progres-data__list">
      <div class="progres-data__item progres__group">
         <div class="progres__elem">
            <div class="progres__elem-contain">
               <p class="progres__elem-prg">
                  Вес
               </p>
               <input v-model="Physics.current_weight" type="text" class="progres-data__input">
            </div>
         </div>
         <div class="progres__elem">
            <div class="progres__elem-contain">
               <p class="progres__elem-prg">
                  Бёдра
               </p>
               <input v-model="Physics.hips_cm" type="text" class="progres-data__input">
            </div>
         </div>
         <div class="progres__elem">
            <div class="progres__elem-contain">
               <p class="progres__elem-prg">
                  Талия
               </p>
               <input v-model="Physics.waist_cm" type="text" class="progres-data__input">
            </div>
         </div>
         <div class="progres__elem">
            <div class="progres__elem-contain">
               <p class="progres__elem-prg">
                  Грудь
               </p>
               <input v-model="Physics.chest_cm" type="text" class="progres-data__input">
            </div>
         </div>
         <button type="submit" class="progres__btn-data">Сохранить</button>
      </div>
      <HomeDataImg
      v-for="(img, index) in imgs"
      :key="index"
      ></HomeDataImg>
   </div>
</template>
<script>
import HomeDataImg from "../home/HomeDataImg.vue";
export default {
  components: {
    HomeDataImg
  },
  data: () => ({
   imgs: [
      {
        img: "1",
      },
      {
        img: "2",
      },
      {
        img: "3",
      },
    ],
    selectedTab: "1",
  }),
  computed:{
     Physics(){
        return this.$store.getters.GetPhysicsParameters;
     },
     info(){
       return []
      }
  },
  mounted(){
      if (userInfo){
         this.$store.dispatch('fetchPhysicsParameters');
      }
   },
  methods: {
   selectTab() {
      this.selectedTab = this.tab.title;
   },
  },
};
</script> 