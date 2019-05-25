$(document).ready(function () {
  $('.js-slick').slick({
    dots: true,
    arrows: false,
    adaptiveHeight: true,
    mobileFirst: true,
  });

  $('.js-slick-multiple').slick({
    dots: false,
    arrows: false,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  $('.navigation-wrapper .bars, .js-close').click(function () {
    toggleNav();
  })

  $('.nav-icon1, .js-close').click(function () {
    $('.nav-icon1').toggleClass('open');
  });

  $('.js-next').click(function () {
    $('.js-slick-multiple').slick('slickNext');
  })

  $('.js-prev').click(function () {
    $('.js-slick-multiple').slick('slickPrev');
  })
});

function toggleNav() {
  $('.nav-overlay').toggleClass('visible');
}

$('.js-next').click(function () {
  $('.js-slick-multiple').slick('slickNext');
})

$('.js-prev').click(function () {
  $('.js-slick-multiple').slick('slickPrev');
})