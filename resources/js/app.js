import.meta.glob(['../images/**', '../fonts/**']);
import Splide from '@splidejs/splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';

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

  const oportunityCarousel = document.querySelectorAll(
    '.oportunity-carousel .splide'
  );
  if (oportunityCarousel.length) {
    oportunityCarousel.forEach((slider) => {
      console.log(slider);

      new Splide(slider, {
        type: 'loop',
        perPage: 1,
        perMove: 1,
        autoplay: true,
        interval: 23000,
        pauseOnHover: false,
        arrows: false,
        pagination: false,
        padding: {
          right: '40%',
          left: '0',
        },
        gap: '50px',
      }).mount();
    });
  }

  const partnersCarousels = document.querySelectorAll('.partners .splide');
  if (partnersCarousels.length) {
    partnersCarousels.forEach((slider) => {
      console.log(slider);

      new Splide(slider, {
        type: 'loop',
        perPage: 7,
        perMove: 1,
        autoplay: true,
        interval: 5000,
        pauseOnHover: true,
        arrows: false,
        pagination: false,
        gap: '48px',
        autoScroll: {
          speed: 1,
        },
        breakpoints: {
          1000: {
            perPage: 3,
          },
          768: {
            perPage: 2,
          },
        },
      }).mount({ AutoScroll });
    });
  }

  const accordion = document.querySelectorAll('.accordion-section-list');
  if (accordion.length) {
    accordion.forEach((item) => {
      item.addEventListener('click', (e) => {
        const target = e.target.closest('.accordion-section-list__item');
        if (!target) {
          return;
        }

        const currentActive = item.querySelector(
          '.accordion-section-list__item--acitve'
        );

        if (currentActive && currentActive !== target) {
          currentActive.classList.remove(
            'accordion-section-list__item--acitve'
          );
        }

        target.classList.toggle('accordion-section-list__item--acitve');
      });
    });
  }

  const testimonialFromPosts = document.querySelectorAll(
    '.testimonials-carousel-posts .splide'
  );
  if (testimonialFromPosts.length) {
    testimonialFromPosts.forEach((slider) => {
      new Splide(slider, {
        type: 'loop',
        perPage: 1,
        perMove: 1,
        autoplay: true,
        interval: 3000,
        pauseOnHover: true,
        arrows: false,
        pagination: true,
        padding: '25%',
        gap: '48px',
      }).mount();
    });
  }
})();
