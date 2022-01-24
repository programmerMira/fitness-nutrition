<template>
   <div v-if="Physics" class="progres-data__list">
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
      <HomeDataImg v-if="Physics.photoes != null"
         v-for="(img, index) in Physics.photoes"
         :key="index" v-bind:img="img.img" @change="OnChangeChild"
      ></HomeDataImg>
      <HomeDataImg v-for="(img, index) in imgs"
         :key="index" v-bind:img="img.img" @change="OnChangeChild"></HomeDataImg>
   </div>
</template>
<script>
import HomeDataImg from "../home/HomeDataImg.vue";
export default {
   props: ["training_id", "phase_number", "can_edit"],
   components: {
      HomeDataImg
   },
   data: () => ({
      selectedTab: "1",
      imgs:[
         {
            "img":1
         },
         {
            "img":2
         },
         {
            "img":3
         }
      ]
   }),
   computed:{
      Physics(){
         console.log("this.phase_number:",this.phase_number);
         return this.$store.getters.GetPhysicsParameters.find(element=>element.phase_number === parseInt(this.phase_number)&&element.training_id==parseInt(this.training_id));
      }
   },
   mounted(){
         if (userInfo){
            this.$store.dispatch('fetchPhysicsParameters');
         }
   },
   methods: {
      disabled(){
         if(this.can_edit != undefined )
            return !this.can_edit;
         return true;
      },
      savePhysics(){
         this.$store.dispatch('setPhysicsParameter',this.Physics);
         this.$store.dispatch('fetchPhysicsParameters');
      },
      OnChangeChild(value){
         console.log(value);
      }
   }
};
</script> 