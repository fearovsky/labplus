import.meta.glob(['../images/**', '../fonts/**']);
import Splide from '@splidejs/splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';
import calculator from './calculator';
import termsHandler from './termsHandler';
import tocInit from './toc';
import rulesTabs from './rulesTabs';
import Modal from './modal.js';
import navHandler from './navHandler.js';

(() => {
  const logosCarousel = document.querySelectorAll('.splide.logos-carousel');
  if (logosCarousel.length) {
    logosCarousel.forEach((slider) => {
      new Splide(slider, {
        type: 'loop',
        autoplay: false,
        perPage: 5,
        perMove: 1,
        interval: 3000,
        pauseOnHover: false,
        arrows: false,
        pagination: false,
        gap: '64px',
        autoScroll: {
          speed: 0.35,
          pauseOnHover: false,
        },
        breakpoints: {
          1000: {
            perPage: 3,
          },
          768: {
            perPage: 1,
            padding: {
              right: '15%',
              left: '15%',
            },
          },
        },
      }).mount({ AutoScroll });
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
        breakpoints: {
          1000: {
            gap: '20px',
            padding: '0',
          },
        },
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
        interval: 3000,
        pauseOnHover: false,
        arrows: false,
        pagination: false,
        padding: {
          right: '40%',
          left: '0',
        },
        gap: '50px',
        breakpoints: {
          1000: {
            padding: {
              right: '20%',
              left: '0',
            },
          },
          768: {
            padding: {
              right: '0',
              left: '0',
            },
          },
        },
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
          speed: 0.5,
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

  const heroSlider = document.querySelectorAll(
    '.hero-section-image-slider .splide'
  );
  if (heroSlider.length) {
    heroSlider.forEach((slider) => {
      new Splide(slider, {
        type: 'fade',
        perPage: 1,
        perMove: 1,
        autoplay: true,
        interval: 5000,
        pauseOnHover: false,
        arrows: false,
        pagination: true,
      }).mount();
    });
  }

  const faqSections = document.querySelectorAll('.faq-section-list');
  if (faqSections.length) {
    faqSections.forEach((item) => {
      item.addEventListener('click', (e) => {
        const target = e.target.closest('.faq-section-list__item');
        if (!target) {
          return;
        }

        const currentActive = item.querySelector(
          '.faq-section-list__item--active'
        );

        if (currentActive && currentActive !== target) {
          currentActive.classList.remove('faq-section-list__item--active');
        }

        target.classList.toggle('faq-section-list__item--active');
      });
    });
  }

  const boxCarousel = document.querySelectorAll('.box-carousel-splide');
  // only 1 per page, pagination arrows true
  if (boxCarousel.length) {
    boxCarousel.forEach((slider) => {
      new Splide(slider, {
        type: 'fade',
        perPage: 1,
        perMove: 1,
        autoplay: true,
        interval: 5000,
        pauseOnHover: true,
        arrows: true,
        pagination: true,
      }).mount();
    });
  }

  calculator('.calculator');
  termsHandler();
  tocInit('.single-post-toc');
  rulesTabs();
  navHandler();

  const modalSystem = new Modal();
})();
