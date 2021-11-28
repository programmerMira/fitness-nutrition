<template>
   <div class="modal fade plugin-modal workout-modal" id="workout" tabindex="-1" role="dialog"
   aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog plugin-modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content plugin-modal__content">
         <button class="plugin-modal__btn-close btn-none" data-dismiss="modal">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
               <rect x="0.351379" y="22.4548" width="31.0238" height="3.20936"
                  transform="rotate(-45 0.351379 22.4548)" fill="#BB01DA" />
               <rect x="2.62067" y="0.518066" width="31.0238" height="3.20936"
                  transform="rotate(45 2.62067 0.518066)" fill="#BB01DA" />
            </svg>
         </button>
         <div class="plugin-modal__head">
            <h4 class="plugin-modal__title">
               Новые тренировочные планы для зала и дома
            </h4>
         </div>
         <div class="workout-checkboxes">
            <label class="workout-checkbox__label" v-for="(locations, index) in locations" :key="index">
               <input class="check__input" @click="disabled = !disabled" type="checkbox" :id="locations.title" :value="locations.title" v-model="locations.value">
               <div class="workout-checkbox">
                   {{ locations.title  }}
               </div>
            </label>
         </div>
         <h6 class="plugin-modal-form__subtitle">
            Выберите новый тренировочный план
         </h6>
         <p class="plugin-modal__txt">
           Чем выше уровень, тем сложнее тренировочный план
         </p> 
         <form class="plugin-modal-form" v-if="activeStep === 1">
            <div class="plugin-checkboxes">
               <label class="plugin-checkbox__label" v-for="(workout, index) in workouts" :key="index">
                  <input class="check__input" @click="disabled = !disabled" type="checkbox" v-model="workout.value">
                  <div class="plugin-checkbox">
                     <div class="plugin-checkbox__number">
                        {{ workout.level  }}
                     </div>
                     <div class="plugin-checkbox__txt plugin-modal__txt">
                        {{ workout.level }} уровень
                        <b>
                           {{ workout.price }} р.
                        </b>
                     </div>
                  </div>
               </label>
            </div>
            <p class="plugin-modal__txt-small">
               Доступ к тренировочному плану предоставляется на 30 календарных дней
            </p>
            <button type="button" :disabled="disabled ? false : true" class="plugin-modal-form__btn btn-none" @click.prevent="next()">оплатить</button>
            <p class="plugin-modal__txt-small center">
               Нажимая “Оплатить”, я принимаю условия Политики обработки персональных данный и условия
               Оферты
            </p>
         </form>
         <div class="plugin-modal-action__block" v-if="activeStep === 2">
            Спасибо! Заказ оформлен. Пожалуйста, подождите. Идет переход к оплате...
         </div>
      </div>
   </div>
</div>
</template>
<script>
   export default {
   data: () => ({
      disabled: false,
      locations: [
         {
            value: false,
            title: 'Дом',
         },
         {
            value: false,
            title: 'Зал',
         },
         {
            value: false,
            title: 'Дом+Зал',
         }
      ],
      workouts: [
         {
            value: false,
            level: '1',
            price: '2 000',
         },
           {
            value: false,
            level: '2',
            price: '2 000',
         },
           {
            value: false,
            level: '3',
            price: '2 000',
         },
      ],
      activeStep: 1,
      formSteps: [],
   }),
   methods: {
      prev() {
      this.activeStep--;
      },
      next() {
      this.activeStep++;
      },
   },
   };
</script>