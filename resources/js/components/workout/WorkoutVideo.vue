<template>
    <div class="workout-video">
          <template v-if="selectedTab == '1'">
            <div class="scroll__contain">
              <div class="workout-video__list">
                <div class="workout-video__item">
                  <div class="workout-video__img-preview">
                    <img src="/images/video/video01.jpg" alt="" />
                    <button
                      type="button"
                      class="workout-video__btn"
                      data-toggle="modal"
                      data-target="#video"
                    >
                      <svg
                        width="24"
                        height="27"
                        viewBox="0 0 24 27"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M22.8547 11.8451C24.1738 12.639 24.1388 14.5632 22.7917 15.3086L3.30879 26.0901C1.96169 26.8355 0.312779 25.8431 0.340746 24.3038L0.745229 2.04034C0.773196 0.500993 2.45707 -0.430825 3.7762 0.363069L22.8547 11.8451Z"
                          fill="white"
                        />
                      </svg>
                    </button>
                  </div>
                  <div class="workout-video__title">Тренировка спины и груди</div>
                </div>
              </div>
              <!--or <-> or-->
              <div class="workout-info__txt-block">
                <div class="workout-info__img">
                  <img src="/images/luba.png" alt="" />
                </div>
                <p>
                  Сегодня у тебя <b>выходной</b> от силовых тренировок.
                  Соблюдай рацион питания, не забывай пить воду,а также
                  можешь сделать наш комплекс для борьбы с целлюлитом
                  Выполни минимум 10 000 шагов!
                </p>
              </div>
              <div class="workout-info__block">
                <h5 class="workout-info__title">
                  Комплекс состоит из 12 процедур (6 дней подряд и 1 день выходной), длительность две недели. Затем делаем перерыв.
                  <b>
                    ДЕНЬ №1
                  </b>
                </h5>
                <ul class="workout-info__list">
                  <li class="workout-info__item">
                    <b>
                      Шаг 1.
                    </b>
                    <p>
                      Выполнить скрабирование в душе на распаренную кожу. Длительность 3-5 минут.
                    </p>
                  </li>
                   <li class="workout-info__item">
                    <b>
                      Шаг 2.
                    </b>
                    <p>
                      На сухую кожу нанести горячее/ холодное обертывание. Обернуться пленкой. Длительность 30-50 минут.
                    </p>
                  </li>
                   <li class="workout-info__item">
                    <b>
                      Шаг 3.
                    </b>
                    <p>
                      На сухую чистую кожу нанести питательный крем.
                    </p>
                  </li>
                </ul>
              </div>

              <div class="modal fade modal-video" id="video" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-video__content">
                        <div class="workout__video">
                          <iframe class="workout-video__embed" width="512" height="288"
                              src="https://www.youtube.com/embed/neHA4MJwpnY" frameborder="0"
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                              allowfullscreen></iframe>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          </template>
        </div>
</template>
<script>

//передаю номер дня и id тренировки => возвращаю этот день
//перед этим при загрузке страницы с тренировками надо прогрузить ищё и дни
//если name == выходной, то выходной!
//в бд идёт "название_видео":"ссылка_на_видео"
//при нажатии на видео в переменную show_video_link заносится ссылка на видео и открывается модалка с этим видео

export default {
  props: ["selectedTab"],
};
</script>
