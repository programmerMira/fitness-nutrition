<template>
   <div class="progres-data__item-photo progres-data__item">
      <input
         name="file"
         type="file"
         @change="previewImage"
         accept="image/*"
      />
      <div v-if="imageData.length > 0">
         <img class="preview" :src="imageData" />
      </div>
   </div>
</template>
<script>
export default {
  props: ["img"],
  data: () => ({
    imageData: "",
  }),
  methods: {
    previewImage: function (event) {
      var input = event.target;
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = (e) => {
          this.imageData = e.target.result;
          this.activeStep++;
        };
        reader.readAsDataURL(input.files[0]);
      }
    },
  },
};
</script>