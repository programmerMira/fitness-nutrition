<template>
<div class="notifications__accardion-container">
   <div class="notifications__accardion" v-for="(info, index) in Notifications" :key="index">
      <div class="notifications__head" v-on:click="accardionActive(index)">
         <div class="notifications__title">
            {{info.name}}
            <span>
               {{(new Date(Date.parse(info.created_at))).toUTCString()}}
            </span>
         </div>
         <svg v-show="false" v-bind:class="{ active: content_open[index] }" class="notifications__svg" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path fill-rule="evenodd" clip-rule="evenodd" d="M3.90498 5.90504C4.17834 5.63167 4.62156 5.63167 4.89493 5.90504L8.39995 9.41006L11.905 5.90504C12.1783 5.63167 12.6216 5.63167 12.8949 5.90504C13.1683 6.1784 13.1683 6.62162 12.8949 6.89499L8.89492 10.895C8.62156 11.1684 8.17834 11.1684 7.90497 10.895L3.90498 6.89499C3.63161 6.62162 3.63161 6.1784 3.90498 5.90504Z" fill="#A1A1A1"/>
         </svg>
      </div>
      <transition name="slide-fade">
         <div class="notifications__body">
            <p class="notifications__subtitle">
              Здравствуйте, {{User.user.name}}!
            </p>
            <p class="notifications__txt">
              {{info.description}}
            </p>
         </div>
      </transition>
   </div>
</div>
</template>
<script>
export default {
   data: () => ({
      content_open:[],
   }),
   computed:{
      User(){
         return this.$store.getters.GetPersonalAccount;
      },
      Notifications(){
         let access_history = this.$store.getters.GetAccessHistory;
         let notifications = this.$store.getters.GetNotifications;

         if(access_history && notifications)
         {
            var date1 = new Date(access_history.activation_date);
            var date2 = new Date();
            let day_number = Math.ceil((Math.abs(date2 - date1))/ (1000 * 60 * 60 * 24)) + 1;
            //console.log("day:", day_number);
            return notifications.filter(element => element.day === day_number);
         }

         return null;
      },
   },
   mounted(){
      if (userInfo){
         this.$store.dispatch('fetchPersonalAccount');
         this.$store.dispatch('fetchNotifications');
         this.$store.dispatch('fetchAccessHistory');
      }
   },
   methods: {
      accardionActive(info) {
         this.content_open[info] = !this.content_open[info];
         //console.log(this.content_open);
      },
  },
};
</script>
