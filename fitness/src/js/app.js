document.addEventListener("DOMContentLoaded", function () {

	$('.burger, .overlay').click(function () {
		$('.burger').toggleClass('clicked');
		$('.overlay').toggleClass('show');
		$('nav').toggleClass('show');
		$('body').toggleClass('overflow');
	});

	$(document).ready(function () {
		$("#nav").on("click", "a", function (event) {
			event.preventDefault();
			var id = $(this).attr('href'),
				top = $(id).offset().top;
			$('body,html').animate({ scrollTop: top }, 1500);
		});
	});

	$('#login').on('shown.bs.modal', function () {
		$('#login').trigger('focus')
	})
	$('#buy').on('shown.bs.modal', function () {
		$('#buy').trigger('focus')
	})
	$('#lose').on('shown.bs.modal', function () {
		$("#login").modal('hide');
	});
	$('#login').on('shown.bs.modal', function () {
		$("#lose").modal('hide');
	});
	$(document).on('hidden.bs.modal', '.modal', function () {
		$('.modal:visible').length
			? $(document.body).addClass('modal-open')
			: $(document.body).css({ paddingRight: 0 });
	});

})


import Vue from "vue";

import Formstep from "./components/Formstep.vue";
import Buy from "./components/Buy.vue";

new Vue({

	el: '#app',

	components: { Formstep, Buy }

})