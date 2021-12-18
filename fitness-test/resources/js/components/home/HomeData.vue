<template>
   <div class="progres-data__list">
      <div class="progres-data__item progres__group">
         <div class="progres__elem">
            <div class="progres__elem-contain">
               <p class="progres__elem-prg">
                  Вес
               </p>
               <input v-if="!disabled()" v-model="Physics.current_weight" type="text" class="progres-data__input">
               <input v-else v-model="Physics.current_weight" type="text" class="progres-data__input" readonly>
            </div>
         </div>
         <div class="progres__elem">
            <div class="progres__elem-contain">
               <p class="progres__elem-prg">
                  Бёдра
               </p>
               <input v-if="!disabled()" v-model="Physics.hips_cm" type="text" class="progres-data__input">
               <input v-else v-model="Physics.hips_cm" type="text" class="progres-data__input" readonly>
            </div>
         </div>
         <div class="progres__elem">
            <div class="progres__elem-contain">
               <p class="progres__elem-prg">
                  Талия
               </p>
               <input v-if="!disabled()" v-model="Physics.waist_cm" type="text" class="progres-data__input">
               <input v-else v-model="Physics.waist_cm" type="text" class="progres-data__input" readonly>
            </div>
         </div>
         <div class="progres__elem">
            <div class="progres__elem-contain">
               <p class="progres__elem-prg">
                  Грудь
               </p>
               <input v-if="!disabled()" v-model="Physics.chest_cm" type="text" class="progres-data__input">
               <input v-else v-model="Physics.chest_cm" type="text" class="progres-data__input" readonly>
            </div>
         </div>
         <button v-if="!disabled()" v-on:click="savePhysics()" type="submit" class="progres__btn-data">Сохранить</button>
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
   disabled(){
    if(this.Physics==null)
      return true;
    var updated_at = new Date(Date.parse(this.Physics.updated_at));
    updated_at.setDate(updated_at.getDate() + 10)
    var today = new Date();
      if(this.Physics.updated_at==null||updated_at<today){
        return false;
      }
      return true;
    },
    savePhysics(){
      this.$store.dispatch('setPhysicsParameter',this.Physics);
      this.$store.dispatch('fetchPhysicsParameters');
    },
  }
};
</script> 