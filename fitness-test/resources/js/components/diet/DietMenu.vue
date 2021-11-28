<template>
   <div class="progres-diet__menu">
      <template v-if="selectedTab == '1'">
         <div class="scroll__contain">
            <div class="progres-diet__contain">
               <div class="progres-diet__block">
                  <div class="progres-diet__title">
                     Завтрак
                  </div>
                  <div class="progres-diet__list">
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Гречка
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           40 гр
                        </div>
                     </div>
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Яйцо отварное
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           2 шт
                        </div>
                     </div>
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Салат овощной
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           100 гр
                        </div>
                     </div>
                  </div>
               </div>
               <div class="progres-diet__block">
                  <div class="progres-diet__btn-play">
                     <svg width="20" height="22" viewBox="0 0 20 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                           d="M18.8049 9.43913C20.124 10.233 20.0891 12.1572 18.742 12.9027L3.89024 21.1213C2.54314 21.8667 0.894223 20.8744 0.92219 19.335L1.23052 2.36373C1.25849 0.824387 2.94236 -0.107432 4.26149 0.686461L18.8049 9.43913Z"
                           fill="white" />
                     </svg>
                  </div>
                  <div class="progres-diet__title">
                     Перекус №1
                  </div>
                  <div class="progres-diet__list">
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Йогурт домашний 2%
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           100 гр
                        </div>
                     </div>
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Яблоко
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           100 гр
                        </div>
                     </div>
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Миндаль
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           100 гр
                        </div>
                     </div>
                  </div>
               </div>
               <div class="progres-diet__block">
                  <div class="progres-diet__btn-play">
                     <svg width="20" height="22" viewBox="0 0 20 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                           d="M18.8049 9.43913C20.124 10.233 20.0891 12.1572 18.742 12.9027L3.89024 21.1213C2.54314 21.8667 0.894223 20.8744 0.92219 19.335L1.23052 2.36373C1.25849 0.824387 2.94236 -0.107432 4.26149 0.686461L18.8049 9.43913Z"
                           fill="white" />
                     </svg>
                  </div>
                  <div class="progres-diet__title">
                     Обед
                  </div>
                  <div class="progres-diet__list">
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Йогурт домашний 2%
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           100 гр
                        </div>
                     </div>
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Яблоко
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           100 гр
                        </div>
                     </div>
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Миндаль
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           100 гр
                        </div>
                     </div>
                  </div>
               </div>
               <div class="progres-diet__block">
                  <div class="progres-diet__btn-play">
                     <svg width="20" height="22" viewBox="0 0 20 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                           d="M18.8049 9.43913C20.124 10.233 20.0891 12.1572 18.742 12.9027L3.89024 21.1213C2.54314 21.8667 0.894223 20.8744 0.92219 19.335L1.23052 2.36373C1.25849 0.824387 2.94236 -0.107432 4.26149 0.686461L18.8049 9.43913Z"
                           fill="white" />
                     </svg>
                  </div>
                  <div class="progres-diet__title">
                     Перекус №2
                  </div>
                  <div class="progres-diet__list">
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Йогурт домашний 2%
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           100 гр
                        </div>
                     </div>
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Яблоко
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           100 гр
                        </div>
                     </div>
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Миндаль
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           100 гр
                        </div>
                     </div>
                  </div>
               </div>
               <div class="progres-diet__block">
                  <div class="progres-diet__btn-play">
                     <svg width="20" height="22" viewBox="0 0 20 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                           d="M18.8049 9.43913C20.124 10.233 20.0891 12.1572 18.742 12.9027L3.89024 21.1213C2.54314 21.8667 0.894223 20.8744 0.92219 19.335L1.23052 2.36373C1.25849 0.824387 2.94236 -0.107432 4.26149 0.686461L18.8049 9.43913Z"
                           fill="white" />
                     </svg>
                  </div>
                  <div class="progres-diet__title">
                     Ужин
                  </div>
                  <div class="progres-diet__list">
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Йогурт домашний 2%
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           100 гр
                        </div>
                     </div>
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Яблоко
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           100 гр
                        </div>
                     </div>
                     <div class="progres-diet__item">
                        <div class="progres-diet__txt">
                           Миндаль
                        </div>
                        <span class="line-dotted"></span>
                        <div class="progres-diet__caption">
                           100 гр
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="diet-info__block">
               <div class="diet-info__title">
                  Дополнительно в течении дня(супер-фуд):
               </div>
               <ul class="diet-info__list">
                  <li class="diet-info__item">
                     <b>* Вода </b>– 2-2,5 литра (чистая либо с лимоном).
                  </li>
                  <li class="diet-info__item">
                     <b>* Витамины Active Woman</b> – после завтрака.
                  </li>
                  <li class="diet-info__item">
                     <b>* Рыбный жир(omega) + Витамин D</b> – во время завтрака либо обеда.
                  </li>
                  <li class="diet-info__item">
                     <b>* Фитнес-батончики/печенье</b> – в качестве перекуса в течение дня.
                  </li>
                  <li class="diet-info__item">
                     <b>* L-карнитин</b> - безвредный жиросжигатель, пить перед тренировкой.
                  </li>
                  <li class="diet-info__item">
                     <b>* Протеиновый коктейль</b> – обязательно после тренировки, либо как замена приема пищи.
                  </li>
                  <li class="diet-info__item">
                     Заказать оригинальные продукты и подробное описание каждого есть у нас в магазине. Для наших подписчиков по коду <b>GOODIETS</b> скидка до 42% - <a href="plugin.html">оформить заказ</a>
                  </li>
               </ul>
            </div>
         </div>
      </template>
   </div>
</template>
<script>
export default {
  props: ["selectedTab"],
};
</script>