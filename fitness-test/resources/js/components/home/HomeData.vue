<template>
   <div class="progres-data__list">
      <div class="progres-data__item progres__group">
         <div class="progres__elem" v-for="(date, index) in info" :key="index">
            <div class="progres__elem-contain">
               <p class="progres__elem-prg">
                  {{date.title}}
               </p>
               <input v-model="date.value" type="text" class="progres-data__input">
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
    info: [
      {
        title: "Вес",
        value: "|"
      },
      {
        title: "Бёдра",
        value: "120"
      },
      {
        title: "Талия",
        value: "80"
      },
      {
        title: "Грудь",
        value: "100"
      },
    ],
    selectedTab: "1",
  }),
  methods: {
   selectTab() {
      this.selectedTab = this.tab.title;
   },
  },
};
</script> 