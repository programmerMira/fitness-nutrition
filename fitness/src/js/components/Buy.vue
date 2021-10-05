
<template>
 	<div class="modal modal-custom fade modal-buy" id="buy" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content modal-custom__content">
				<button type="button" class="modal__close" data-dismiss="modal" aria-label="Close">
					<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect y="16.3125" width="23.0694" height="2.38648" transform="rotate(-45 0 16.3125)" fill="#9180FF" />
						<rect x="1.68752" width="23.0694" height="2.38648" transform="rotate(45 1.68752 0)" fill="#9180FF" />
					</svg>
				</button>
				<h5 class="modal__title">
					ВАШ ЗАКАЗ
				</h5>
				<div class="buy-head">
					<p class="buy-head__prg-small">
						Вы удалили “Пакет Марафон”
					</p>
					<button type="button" class="buy-head__prg-small none-btn">
						Вернуть
					</button>
				</div>
				<!-- <div class="buy-head">
					<p class="buy-head__prg">
						<b>Пакет Марафон</b>
					</p>
					<div class="buy-head__prg">
						5 000 р.
						<span class="remove">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect y="16.3125" width="23.0694" height="2.38648" transform="rotate(-45 0 16.3125)" fill="#ffffff" />
								<rect x="1.68752" width="23.0694" height="2.38648" transform="rotate(45 1.68752 0)" fill="#ffffff" />
							</svg>
						</span>
					</div>
				</div> -->
				<p class="buy-head__prg">
					<b>ВАЖНО! Внимательно вводите ваш электронный адрес без ошибок.</b>
				</p>
				<div class="buy__label buy-head__txt-small">
					Логин/пароль придёт на указанную Вами электронную почту в течении суток после оплаты - эти данные используйте для входа в Личный кабинет.
				</div>
				<form class="buy-form">
					<div class="buy-form__row buy-form__row-three">
						<div class="buy__group">
							<label for="name" class="buy__label">
								Имя
							</label>
							<input id="name" type="text" class="buy__input" placeholder="Иван Иванов">
						</div>
						<div class="buy__group">
							<label for="age" class="buy__label">
								Ваш возраст
							</label>
							<input id="age" type="text" class="buy__input" placeholder="25 лет">
						</div>
						<div class="buy__group">
							<label for="email" class="buy__label">
								Ваш Email
							</label>
							<input id="email" type="email" class="buy__input" placeholder="Email">
						</div>
						<div class="buy__group">
							<label for="weight" class="buy__label">
								Ваш вес
							</label>
							<input id="weight" type="text" class="buy__input" placeholder="60 кг">
						</div>
						<div class="buy__group">
							<label for="growth" class="buy__label">
								Ваш рост
							</label>
							<input id="growth" type="text" class="buy__input" placeholder="165 см">
						</div>
						<div class="buy__group">
							<label for="desired" class="buy__label">
								Желаемый вес
							</label>
							<input id="desired" type="txt" class="buy__input" placeholder="55 кг">
						</div>
					</div>
					<!-- <div class="buy-form__row">
            		<div class="h"  v-for="select in selects" :key="select.index">
							<div class="buy__selector" :value="select.value" :data-list="select.list">
								<label class="buy__label">
									{{ select.label }}
								</label>
								<div class="buy__input" @click="toggle()">
									<div class="label">
									<span>{{ select.value }}</span>
									</div>
									<div class="arrow">
									<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M17.9258 22.8515C17.8257 22.8515 17.7266 22.8319 17.6342 22.7936C17.5418 22.7553 17.4577 22.6993 17.387 22.6285L7.99805 13.2391C7.85525 13.0962 7.77502 12.9025 7.77502 12.7006C7.77502 12.4986 7.85525 12.3049 7.99805 12.162L17.387 2.77256C17.4577 2.70181 17.5417 2.64568 17.6341 2.60737C17.7265 2.56907 17.8256 2.54934 17.9256 2.54932C18.0256 2.54929 18.1247 2.56897 18.2171 2.60724C18.3096 2.6455 18.3935 2.70159 18.4643 2.77231C18.5351 2.84303 18.5912 2.927 18.6295 3.01941C18.6678 3.11183 18.6875 3.21088 18.6876 3.31092C18.6876 3.41096 18.6679 3.51002 18.6296 3.60246C18.5914 3.69489 18.5353 3.77888 18.4646 3.84963L9.6139 12.7003L18.4646 21.551C18.5712 21.6575 18.6438 21.7932 18.6732 21.9411C18.7026 22.0889 18.6875 22.2421 18.6298 22.3813C18.5722 22.5205 18.4745 22.6395 18.3491 22.7232C18.2238 22.8069 18.0765 22.8515 17.9258 22.8515Z" fill="#9180FF"/>
									</svg>
									</div>
									<div :class="{ hidden : !visible, visible }">
										<ul>
											<li v-for="item in select.list" @click="select(item)" :key="item.index">{{ item }}</li>
											<li @click="select(list)">{{ select.list }}</li>
										</ul>
									</div>
								</div>
							</div>
            		</div>
				
					</div> -->
				</form>
			</div>
		</div>
	</div>
</template>

<script>
export default {
  data: () => ({
    // valuelife: 'Select a Fruit',
    // list: ["Orange","Apple","Kiwi", "Lemon", "Pineapple"],
    visible: false,
    		selects: [
					{
						label: 'Выберите Ваш образ жизни: ',
						value: 'Ваш образ жизни',
						list: ["Малоактивный", "Среднеактивный", "Активный"],
					},
					{
						label: 'Выберите Ваш образ жизни: ',
						value: 'Ваш образ жизни',
						list: ["Малоактивный", "Среднеактивный", "Активный"],
					},
				]
  }),
  methods: {
    toggle() {
      this.visible = !this.visible;
    },
    select(option) {
      this.select.value = option;
    }
  }
};
</script>