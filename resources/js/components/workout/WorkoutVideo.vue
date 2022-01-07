<template>
    <div class="workout-video">
          <template>
            <div class="scroll__contain">
              <div v-if="!IsDayOff&&current_day" class="workout-video__list">
                <div v-for="(video, index) in current_day.videos" :key="index" class="workout-video__item">
                  <div class="workout-video__img-preview" data-toggle="modal" :data-target="'#video-'+video.title">
                    <iframe width="100%" height="100%"
                      :src="video.link+'?autoplay=0&showinfo=0&controls=0&mute=1'" frameborder="0"
                    ></iframe>
                    <button
                      type="button"
                      class="workout-video__btn"
                      data-toggle="modal"
                      :data-target="'#video-'+video.title"
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
                  <div class="workout-video__title">{{video.title}}</div>
                  <div class="modal fade modal-video" :id="'video-'+video.title" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content modal-video__content">
                          <div class="workout__video">
                            <iframe class="workout-video__embed" width="512" height="288"
                                :src="video.link" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div v-else class="workout-info__txt-block">
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
                    ДЕНЬ №{{day}}
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
            </div>
          </template>
        </div>
</template>
<script>

//инфа про выходной, описание тренировки + доп.шаги -> raw_html
//training_day + current_training => save (add to db field is_active bool)

export default {
  props: ["day","trainingId"],
  data: () => ({
    current_training: null,
    current_day: null,
    show_video_link: null,
  }),
  mounted(){
    if (userInfo){
      this.$store.dispatch('fetchTrainingUsers');
    }
  },
  computed:{
    IsDayOff()
    {
      /*
      console.log("this.day:",this.day);
      console.log("this.trainingId:",this.trainingId);
      console.log("this.current_training:",this.current_training);
      */

      this.current_training = this.$store.getters.GetTrainingUsers.find(element => element.training_id === this.trainingId);
      if(this.current_training){
        this.current_day = this.current_training.days.find(element => element.day_number === parseInt(this.day));
        //console.log("this.current_day:",this.current_day);
        if(this.current_day.name === "Выходной")
          return true
      }
      return false
    },
    VideoLink(){
      this.show_video_link = this.current_day.videos[0].link;
      return this.show_video_link;
    }
  },
  methods:{
    videoLink(link){
      this.show_video_link = link;
      console.log(this.show_video_link);
    }
  }
};
</script>
