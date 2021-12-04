<template>
    <div
        class="modal modal-custom fade modal-buy"
        id="buy"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-custom__content">
                <button
                    type="button"
                    class="modal__close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <svg
                        width="18"
                        height="18"
                        viewBox="0 0 18 18"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <rect
                            y="16.3125"
                            width="23.0694"
                            height="2.38648"
                            transform="rotate(-45 0 16.3125)"
                            fill="#9180FF"
                        />
                        <rect
                            x="1.68752"
                            width="23.0694"
                            height="2.38648"
                            transform="rotate(45 1.68752 0)"
                            fill="#9180FF"
                        />
                    </svg>
                </button>

                <h5 class="modal__title">ВАШ ЗАКАЗ</h5>
                <p class="buy-head__prg">
                    <b>ВАЖНО! Внимательно вводите ваш электронный адрес без ошибок.</b>
                </p>
                <div class="buy__label buy-head__txt-small">
                    Логин/пароль придёт на указанную Вами электронную почту в течении
                    суток после оплаты - эти данные используйте для входа в Личный
                    кабинет.
                </div>
                <form class="buy-form" v-if="activeStep === 1">
                    <div class="buy-form__row buy-form__row-three">
                        <div class="buy__group" v-for="(info, index) in users" :key="index">
                            <label for="weight" class="buy__label">
                                {{ info.name }}
                            </label>
                            <input
                                id="weight"
                                type="text"
                                class="buy__input"
                                :placeholder="info.placeholder"
                                v-model="info.value"
                            />
                        </div>
                    </div>
                    <div class="buy-form__row">
                        <Myselect
                            v-for="(select, index) in selects"
                            :key="index"
                            :select="select"
                            v-on:result="result"
                        ></Myselect>
                    </div>
                    <div class="buy__price">Сумма: 5 000р.</div>
                    <button type="submit" class="button buy-form__btn" @click.prevent="next()">
                        ОПЛАТИТЬ И ЗАРЕГИСТРИРОВАТЬСЯ
                    </button>
                </form>
                <div class="buy-form__loading" v-if="activeStep === 2">
          <span
          >Спасибо! Заказ оформлен. Пожалуйста, подождите. Идет переход к
            оплате...</span
          >
                </div>

                <div class="buy-form__prg">
                    Нажимая “Оплатить и зарегестрироваться”, я принимаю условия
                    <span>Политики обработки персональных данный и условия Оферты </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Myselect from "../Select.vue";

export default {
  components: {
    Myselect,
  },

  data: () => ({
    disabled: false,
    errors:[],
    activeStep: 1,
    deletepackage: false,
    returnpackage: true,
    users: [
      {
        name: "Имя",
        placeholder: "Любовь Мишанкова",
        value: "",
      },
      {
        name: "Ваш возраст",
        placeholder: "25 лет",
        value: "",
      },
      {
        name: "Ваш Email",
        placeholder: "Email",
        value: "",
      },
      {
        name: "Ваш вес",
        placeholder: "60 кг",
        value: "",
      },
      {
        name: "Ваш рост",
        placeholder: "165 см",
        value: "",
      },
      {
        name: "Желаемый вес",
        placeholder: "55 кг",
        value: "",
      },
    ],
    selects: [
      {
        label: "Выберите Ваш образ жизни: ",
        value: "Ваш образ жизни",
        list: ["Малоактивный", "Среднеактивный", "Активный"],
      },
      {
        label: "Выберите проблемные зоны: ",
        value: "Руки",
        list: [
          "Руки",
          "Cпина",
          "Живот",
          "Бока",
          "Ягодицы",
          "Бёдра",
          "Голень",
          "Всё тело",
        ],
      },
      {
        label: "Тренировки для: ",
        value: "Дома",
        list: ["Дома", "Зала", "Дом + зал (+ 950 р.)"],
      },
      {
        label: "Желаемая каллорийность меню: ",
        value: "1300-1400",
        list: ["1300-1400", "1500-1600", "1800-1900", "2000-2100"],
      },
    ],
  }),
  methods: {
    toggleDelete() {
      this.deletepackage = !this.deletepackage;
    },
    result(item) {
      console.log("result=>", item);
    },
    prev() {
      this.activeStep--;
    },
    next() {
      this.activeStep++;
    },
    // toggle() {
    //    this.visible = !this.visible;
    // },
    // select(item) {
    // 	this.select.value = item.list;
    // 	console.log(item)
    // }
  },
};
</script>
