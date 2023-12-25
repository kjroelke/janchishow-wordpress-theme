import '../../styles/pages/front-page.scss';
import { newSlider } from '../swiper';

const recentEpisodes = document.getElementById('recent-episodes-swiper');
if (recentEpisodes) {
	const recentEpisodeSlider = newSlider(recentEpisodes, {
		pagination: {
			el: '.swiper-recent-episodes-pagination',
		},

		// Navigation arrows
		navigation: {
			nextEl: '.swiper-recent-episodes-button-next',
			prevEl: '.swiper-recent-episodes-button-prev',
		},
	});
	console.log(recentEpisodeSlider);
}

const faqs = document.getElementById('faq-swiper');
if (faqs) {
	const faqSlider = newSlider(faqs, {
		pagination: {
			el: '.swiper-faq-pagination',
		},

		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-faq-next',
			prevEl: '.swiper-button-faq-prev',
		},
	});
	console.log(faqSlider);
}
