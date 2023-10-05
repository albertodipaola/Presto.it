import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

var annSwiper = new Swiper(".swiper-ann", {
  slidesPerView: 1,
  spaceBetween: 10,

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
  },  

  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },

    992: {
      slidesPerView: 3,
      spaceBetween: 30,
    },

    1200: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
  }
});

//swiper image
var imgSwiper = new Swiper(".imgSwiper", {
  loop: true,
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var imgSwiper2 = new Swiper(".imgSwiper2", {
  loop: true,
  spaceBetween: 10,
  pagination: {
    el: ".swiper-pagination",
    type: "fraction",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  thumbs: {
    swiper: imgSwiper,
  },
});
