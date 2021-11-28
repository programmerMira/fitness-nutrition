<template>
<div>
   <div class="notifications__accardion" v-for="(info, index) in content" :key="index">
      <div class="notifications__head" @click="info.accardion = !info.accardion">
         <div class="notifications__title">
            {{info.title}}
            <span>
               now
            </span>
         </div>
         <svg v-bind:class="{ active: info.accardion }" class="notifications__svg" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path fill-rule="evenodd" clip-rule="evenodd" d="M3.90498 5.90504C4.17834 5.63167 4.62156 5.63167 4.89493 5.90504L8.39995 9.41006L11.905 5.90504C12.1783 5.63167 12.6216 5.63167 12.8949 5.90504C13.1683 6.1784 13.1683 6.62162 12.8949 6.89499L8.89492 10.895C8.62156 11.1684 8.17834 11.1684 7.90497 10.895L3.90498 6.89499C3.63161 6.62162 3.63161 6.1784 3.90498 5.90504Z" fill="#A1A1A1"/>
         </svg>
      </div>
      <transition name="slide-fade">
         <div class="notifications__body" v-if="info.accardion">
            <p class="notifications__subtitle">
              {{info.subtitle}} 
            </p>
            <p class="notifications__txt">
              {{info.text}} 
            </p>
         </div>
      </transition>
   </div>
</div>
</template>
<script>
export default {
    props: ["info"],
    data: () => ({
      content: [
      {
        title: "Application name 1",
        subtitle: "Hi Anastassia!",
        text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor",
        accardion: true,
      },
      {
        title: "Application name 2",
        subtitle: "Hi Anastassia!",
        text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor",
        accardion: true,
      },
         {
        title: "Application name 3",
        subtitle: "Hi Anastassia!",
        text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor",
        accardion: true,
      },
    ],
  }),
   methods: {
   accardionActive() {
      this.info.accardion = !this.info.accardion;
   },
  },
};
</script>