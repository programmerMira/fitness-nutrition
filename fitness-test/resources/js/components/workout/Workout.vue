<template>
  <div class="progress__container">
    <div class="progress__col-first">
      <div class="progress__row">
        <div class="progress-level">
          <div class="progress-level__title">
            Любовь
            <div class="progress-level__mob">1 уровень</div>
          </div>
          <div class="level__chart">
            <svg
              class="radial-progress"
              data-percentage="75"
              viewBox="0 0 86 86"
            >
              <defs>
                <linearGradient
                  id="linear"
                  x1="46.2954"
                  y1="0"
                  x2="46.2954"
                  y2="99.0139"
                  gradientUnits="userSpaceOnUse"
                >
                  <stop stop-color="#A697FF" />
                  <stop offset="1" stop-color="#573DFF" />
                </linearGradient>
              </defs>
              <circle class="incomplete" cx="43" cy="43" r="35"></circle>
              <circle
                class="complete"
                cx="43"
                cy="43"
                r="35"
                stroke="url(#linear)"
              ></circle>
              <circle
                class="incomplete incomplete-mob"
                cx="43"
                cy="43"
                r="35"
              ></circle>
              <circle
                class="complete complete-mob"
                cx="43"
                cy="43"
                r="35"
                stroke="url(#linear)"
              ></circle>
            </svg>
            <div class="progress-level__chart-txt">
              <p class="progress-level__chart-level">1 уровень</p>
              <div class="progress-level__current"></div>
            </div>
          </div>
        </div>
        <div class="progress-result">
          <div class="progress-result__title">-8 кг</div>
          <div class="progress-result__caption">
            <span>Мой</span> результат
            <p
              class="
                progress-level__chart-level progress-level__chart-level-mob
              "
            >
              1 уровень
            </p>
          </div>
        </div>
      </div>
      <div class="calendar workout">
        <div class="calendar__container">
          <div class="calendar__title">Календарь прогресса</div>
          <div class="calendar__days">
            <div
              class="calendar__day"
              v-for="tab in tabs"
              @click="selectedTab = tab.title"
              :key="tab.title"
              :class="{ active: selectedTab == tab.title }"
            >
              <span>{{ tab.title }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="progress__col-second">
      <div>
        <div
          class="modal fade modal-video"
          id="video"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-video__content">
              <div class="workout__video">
                <iframe
                  class="workout-video__embed"
                  width="512"
                  height="288"
                  src="https://www.youtube.com/embed/neHA4MJwpnY"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen
                ></iframe>
              </div>
            </div>
          </div>
        </div>
        <div class="progress-block">
          <div class="progress-block__svg-elem">
            <svg
              width="280"
              height="322"
              viewBox="0 0 280 322"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <ellipse
                opacity="0.13"
                rx="164.341"
                ry="156.191"
                transform="matrix(-0.969532 -0.244963 0.273341 -0.961917 202.027 131.5)"
                fill="white"
              />
              <ellipse
                opacity="0.13"
                rx="138.392"
                ry="131.529"
                transform="matrix(-0.969532 -0.244963 0.273341 -0.961917 220.71 114.066)"
                fill="white"
              />
            </svg>
          </div>
          <div class="progress-block__head">
            <h5 class="progress-block__title">Тренировки</h5>
            <div class="select__wrap select-workout__wrap">
              <ul class="default__option">
                <li class="option selected">Для зала</li>
                <svg
                  class="select__svg"
                  width="17"
                  height="9"
                  viewBox="0 0 17 9"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M16.0543 0.602247C16.0544 0.681312 16.0388 0.759609 16.0086 0.832666C15.9783 0.905724 15.934 0.97211 15.878 1.02804L8.45314 8.44784C8.34019 8.56069 8.18701 8.62408 8.02729 8.62408C7.86757 8.62408 7.71439 8.56069 7.60143 8.44784L0.176538 1.02804C0.120587 0.972146 0.0761993 0.905792 0.0459089 0.832759C0.0156185 0.759727 1.86629e-05 0.681447 1.67352e-08 0.602389C-1.86294e-05 0.523332 0.0155444 0.445045 0.0458003 0.371998C0.0760563 0.298951 0.120413 0.232574 0.176337 0.176659C0.232261 0.120743 0.298658 0.0763845 0.371737 0.046113C0.444816 0.0158415 0.523145 0.000250816 0.602253 0.000231743C0.68136 0.000213623 0.759697 0.0157671 0.83279 0.0460043C0.905883 0.0762405 0.972301 0.120569 1.02825 0.176458L8.02709 7.17087L15.0259 0.176458C15.1102 0.0922174 15.2175 0.0348415 15.3344 0.0115919C15.4513 -0.0116568 15.5724 0.000263214 15.6825 0.0458469C15.7926 0.0914307 15.8867 0.16863 15.9529 0.267672C16.0191 0.366714 16.0544 0.48315 16.0543 0.602247Z"
                    fill="white"
                  />
                </svg>
              </ul>
              <ul class="select__ul">
                <li>Для дома</li>
                <li>Для зала</li>
              </ul>
            </div>
          </div>
          <ul class="progress-block__steps">
            <li class="progress-block__step active">1 Уровень</li>
            <li class="progress-block__step">2 Уровень</li>
            <li class="progress-block__step">3 Уровень</li>
          </ul>
        </div>
        <WorkoutVideo :selectedTab="selectedTab"></WorkoutVideo>
      </div>
    </div>
  </div>
</template>
<script>
// import WorkoutVideo from "../components/workout/WorkoutVideo.vue";
import WorkoutCalendar from "../components/workout/WorkoutVideo.vue";

export default {
  components: {
    WorkoutVideo,
    WorkoutCalendar,
  },
  data: () => ({
    tabs: [
      {
        title: "1",
      },
      {
        title: "2",
      },
      {
        title: "3",
      },
      {
        title: "4",
      },
      {
        title: "5",
      },
      {
        title: "6",
      },
      {
        title: "7",
      },
      {
        title: "8",
      },
      {
        title: "9",
      },
      {
        title: "10",
      },
      {
        title: "11",
      },
      {
        title: "12",
      },
      {
        title: "13",
      },
      {
        title: "14",
      },
      {
        title: "15",
      },
      {
        title: "16",
      },
      {
        title: "17",
      },
      {
        title: "18",
      },
      {
        title: "19",
      },
      {
        title: "20",
      },
      {
        title: "21",
      },
      {
        title: "22",
      },
      {
        title: "23",
      },
      {
        title: "24",
      },
      {
        title: "25",
      },
      {
        title: "26",
      },
      {
        title: "27",
      },
      {
        title: "28",
      },
      {
        title: "29",
      },
      {
        title: "30",
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