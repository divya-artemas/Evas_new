AOS.init();
 //Menu
 $('.menu-toggle').click(function() {
  $(this).toggleClass("is-active");
  $('nav').toggleClass('active');
  $('body').toggleClass('menu-bg');
});

// Onscroll    
$(window).scroll(function() {
  if ($(this).scrollTop() > 50) {
      $('.header').addClass('bgcolor');
  } else {
      $('.header').removeClass('bgcolor');
  }
});
$(document).ready(function () {
    $(".accordion-items").on("click", ".accordion-heading", function () {
        $(this).toggleClass("active").next().slideToggle().toggleClass("border-bottom");

        $(".accordion-content").not($(this).next()).slideUp(300).removeClass("border-bottom");

        $(this).siblings().removeClass("active");
        $(".accordion-content").removeClass("open");
        $(".accordion-heading").removeClass("open");
    });
});







