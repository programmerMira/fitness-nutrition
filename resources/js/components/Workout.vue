<template>
  <main class="main account-main">
    <header class="account-header workout">
      <MenuOffice></MenuOffice>
    </header>
    <section id="account-head" class="workout">
        <Logout></Logout>
    </section>
    <section id="progress" class="workout">
      <div class="account-container">
          <div class="progress__container">
            <div class="progress__col-first">
                <div class="progress__row">
                  <div class="progress-level">
                      <div class="progress-level__title">
                        Любовь
                        <div class="progress-level__mob">1 уровень</div>
                      </div>
                      <div class="level__chart">
                        <svg class="radial-progress" data-percentage="75" viewBox="0 0 86 86">
                            <defs>
                              <linearGradient id="linear" x1="46.2954" y1="0" x2="46.2954" y2="99.0139"
                                  gradientUnits="userSpaceOnUse">
                                  <stop stop-color="#A697FF" />
                                  <stop offset="1" stop-color="#573DFF" />
                              </linearGradient>
                            </defs>
                            <circle class="incomplete" cx="43" cy="43" r="35"></circle>
                            <circle class="complete" cx="43" cy="43" r="35" stroke="url(#linear)"></circle>
                            <circle class="incomplete incomplete-mob" cx="43" cy="43" r="35"></circle>
                            <circle class="complete complete-mob" cx="43" cy="43" r="35" stroke="url(#linear)">
                            </circle>
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
                        <p class="
                        progress-level__chart-level progress-level__chart-level-mob
                      ">
                            1 уровень
                        </p>
                      </div>
                  </div>
                </div>
                <div class="calendar workout">
                  <div class="calendar__container">
                    <div class="calendar__slider-workout">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide" v-for="(tabs, index) in slider" :key="index">
                            <div class="calendar__title">
                              <span>Календарь активности</span> <h5>{{ tabs.menutitle }}</h5>
                            </div>
                            <div class="calendar__days">
                              <div
                              class="calendar__day"
                              v-for="(tab, index) in tabs.days" 
                              :key="index"
                              @click="selectedTab = tab.title"
                              :class="{ active: selectedTab == tab.title }"
                              >
                              <span>{{ tab.title }}</span>
                              </div>
                            </div>
                        </div>
                      </div> 
                      <div class="calendar__slider-workout-pagination">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                      </div>
                    </div> 
                  </div>
                </div>
            </div>
            <div class="progress__col-second">
                <div>
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
                  <div class="progress-block">
                      <div class="progress-block__svg-elem">
                        <svg width="280" height="322" viewBox="0 0 280 322" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <ellipse opacity="0.13" rx="164.341" ry="156.191"
                              transform="matrix(-0.969532 -0.244963 0.273341 -0.961917 202.027 131.5)"
                              fill="white" />
                            <ellipse opacity="0.13" rx="138.392" ry="131.529"
                              transform="matrix(-0.969532 -0.244963 0.273341 -0.961917 220.71 114.066)"
                              fill="white" />
                        </svg>
                      </div>
                      <div class="progress-block__head">
                        <h5 class="progress-block__title">Тренировки</h5>
                        <div class="select__wrap select-workout__wrap">
                            <ul class="default__option">
                              <li class="option selected">Для зала</li>
                            </ul>
                            <ul class="select__ul">
                              <li>Для дома</li>
                              <li class="disabled">
                                Для зала
                                <svg class="icon" width="14" height="14" viewBox="0 0 14 14" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0)">
                                      <path
                                        d="M10.9375 14H3.0625C2.33917 14 1.75 13.4114 1.75 12.6875V6.5625C1.75 5.83858 2.33917 5.25 3.0625 5.25H10.9375C11.6608 5.25 12.25 5.83858 12.25 6.5625V12.6875C12.25 13.4114 11.6608 14 10.9375 14ZM3.0625 6.125C2.82158 6.125 2.625 6.321 2.625 6.5625V12.6875C2.625 12.929 2.82158 13.125 3.0625 13.125H10.9375C11.1784 13.125 11.375 12.929 11.375 12.6875V6.5625C11.375 6.321 11.1784 6.125 10.9375 6.125H3.0625Z"
                                        fill="#BEBEBE" />
                                      <path
                                        d="M10.0625 6.125C9.821 6.125 9.625 5.929 9.625 5.6875V3.5C9.625 2.05275 8.44725 0.875 7 0.875C5.55275 0.875 4.375 2.05275 4.375 3.5V5.6875C4.375 5.929 4.179 6.125 3.9375 6.125C3.696 6.125 3.5 5.929 3.5 5.6875V3.5C3.5 1.56975 5.06975 0 7 0C8.93025 0 10.5 1.56975 10.5 3.5V5.6875C10.5 5.929 10.304 6.125 10.0625 6.125Z"
                                        fill="#BEBEBE" />
                                      <path
                                        d="M6.99992 9.91665C6.3565 9.91665 5.83325 9.3934 5.83325 8.74998C5.83325 8.10656 6.3565 7.58331 6.99992 7.58331C7.64334 7.58331 8.16659 8.10656 8.16659 8.74998C8.16659 9.3934 7.64334 9.91665 6.99992 9.91665ZM6.99992 8.45831C6.83951 8.45831 6.70826 8.58898 6.70826 8.74998C6.70826 8.91098 6.83951 9.04165 6.99992 9.04165C7.16034 9.04165 7.29159 8.91098 7.29159 8.74998C7.29159 8.58898 7.16034 8.45831 6.99992 8.45831Z"
                                        fill="#BEBEBE" />
                                      <path
                                        d="M7 11.6667C6.7585 11.6667 6.5625 11.4707 6.5625 11.2292V9.625C6.5625 9.3835 6.7585 9.1875 7 9.1875C7.2415 9.1875 7.4375 9.3835 7.4375 9.625V11.2292C7.4375 11.4707 7.2415 11.6667 7 11.6667Z"
                                        fill="#BEBEBE" />
                                  </g>
                                  <defs>
                                      <clipPath id="clip0">
                                        <rect width="14" height="14" fill="white" />
                                      </clipPath>
                                  </defs>
                                </svg>
                              </li>
                            </ul>
                            <svg class="select__svg" width="17" height="9" viewBox="0 0 17 9" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M16.0543 0.602247C16.0544 0.681312 16.0388 0.759609 16.0086 0.832666C15.9783 0.905724 15.934 0.97211 15.878 1.02804L8.45314 8.44784C8.34019 8.56069 8.18701 8.62408 8.02729 8.62408C7.86757 8.62408 7.71439 8.56069 7.60143 8.44784L0.176538 1.02804C0.120587 0.972146 0.0761993 0.905792 0.0459089 0.832759C0.0156185 0.759727 1.86629e-05 0.681447 1.67352e-08 0.602389C-1.86294e-05 0.523332 0.0155444 0.445045 0.0458003 0.371998C0.0760563 0.298951 0.120413 0.232574 0.176337 0.176659C0.232261 0.120743 0.298658 0.0763845 0.371737 0.046113C0.444816 0.0158415 0.523145 0.000250816 0.602253 0.000231743C0.68136 0.000213623 0.759697 0.0157671 0.83279 0.0460043C0.905883 0.0762405 0.972301 0.120569 1.02825 0.176458L8.02709 7.17087L15.0259 0.176458C15.1102 0.0922174 15.2175 0.0348415 15.3344 0.0115919C15.4513 -0.0116568 15.5724 0.000263214 15.6825 0.0458469C15.7926 0.0914307 15.8867 0.16863 15.9529 0.267672C16.0191 0.366714 16.0544 0.48315 16.0543 0.602247Z"
                                  fill="white" />
                            </svg>
                        </div>
                      </div>
                  </div>
                  <WorkoutVideo :selectedTab="selectedTab"></WorkoutVideo>
                </div>
            </div>
          </div>
      </div>
    </section>
  </main>
</template>
<script>
import WorkoutVideo from "../components/workout/WorkoutVideo.vue";
import Logout from "../components/Logout.vue";
import MenuOffice from "../components/Menu.vue";

export default {
  components: {
    WorkoutVideo,
    MenuOffice,
    Logout
  },
  data: () => ({
     slider: [
         {
            menutitle: "Уровень №1",
            days: [
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
         },
         {
            menutitle: "Уровень №2",
            days: [
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