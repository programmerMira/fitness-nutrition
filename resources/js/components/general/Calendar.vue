<template>
    <div class="calendar__days">
      <div
        class="calendar__day"
        v-for="tab in tabs"
        :key="tab.title"
        @click="selectedTab = tab.title"
        :class="{ active: selectedTab == tab.title }"
      >
        <span>{{ tab.title }}</span>
      </div>
    </div>
</template> 
<script>
export default {
  props: ["tab"],
};
</script>