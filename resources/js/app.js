import.meta.glob(['../images/**', '../fonts/**']);
import Splide from '@splidejs/splide';

(() => {
  const logosCarousel = document.querySelectorAll('.splide.logos-carousel');
  if (logosCarousel.length) {
    logosCarousel.forEach((slider) => {
      console.log(slider);
      new Splide(slider, {
        type: 'loop',
        perPage: 5,
        perMove: 1,
        autoplay: true,
        interval: 3000,
        pauseOnHover: true,
        arrows: false,
        pagination: false,
        gap: '64px',
        breakpoints: {
          1000: {
            perPage: 3,
          },
          768: {
            perPage: 2,
          },
        },
      }).mount();
    });
  }

  const testimonialCaseStudyCarousel = document.querySelectorAll(
    '.case-study-testimonial .splide'
  );
  if (testimonialCaseStudyCarousel.length) {
    testimonialCaseStudyCarousel.forEach((slider) => {
      console.log(slider);

      new Splide(slider, {
        type: 'loop',
        perPage: 1,
        perMove: 1,
        autoplay: true,
        interval: 3000,
        pauseOnHover: true,
        arrows: false,
        pagination: true,
        padding: '17%',
        gap: '0px',
      }).mount();
    });
  }
})();
