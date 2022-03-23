const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  effect: "fade",
 autoplay: {
          delay: 4500,
          disableOnInteraction: false,
        },

  // If we need pagination
  pagination: {
    el: ".swiper-scrollbar",
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
     hide: true,
  },
});
