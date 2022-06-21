


jQuery(document).ready(function() {

  jQuery(window).load(function() {
      $(".loader").fadeOut(1500);
  });

});












/*===== EXPANDER MENU  =====*/ 
const showMenu = (toggleId, navId)=>{
  const toggle = document.getElementById(toggleId),
  nav = document.getElementById(navId)

  if(toggle && nav){
    toggle.addEventListener('click', ()=>{
      nav.classList.toggle('show')
      toggle.classList.toggle('bx-x')
    })
  }
}
showMenu('header-toggle','nav-menu')

/*===== ACTIVE AND REMOVE MENU =====*/
const navLink = document.querySelectorAll('.nav__link');   

function linkAction(){
/*Active link*/
navLink.forEach(n => n.classList.remove('active'));
this.classList.add('active');
}
navLink.forEach(n => n.addEventListener('click', linkAction));



// 9. client-testimonial one item carousel
$('.slider-one').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  dots:false,
  arrows:false,
  autoplaySpeed: 2000,
  nextArrow:'<i class="fas fa-chevron-left  next-arrow"></i>',
  prevArrow:'<i class="fas fa-chevron-right  previous-arrow"></i>',
 
  responsive: [
    {
      breakpoint: 992,
      settings: {
    
      }
    },
    {
      breakpoint: 768,
      settings: {
   
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});












// $('.banner-slider1').slick({
//   slidesToShow: 1,
//   slidesToScroll: 1,
//   autoplay: false,
//   dots:false,
//   arrows:false,
//   autoplaySpeed: 2000,
//   nextArrow:'<i class="fas fa-chevron-left  next-arrow"></i>',
//   prevArrow:'<i class="fas fa-chevron-right  previous-arrow"></i>',
 
//   responsive: [
//     {
//       breakpoint: 992,
//       settings: {
    
//       }
//     },
//     {
//       breakpoint: 768,
//       settings: {
   
//       }
//     },
//     {
//       breakpoint: 576,
//       settings: {
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         dots: false
//       }
//     }
//     // You can unslick at a given breakpoint now by adding:
//     // settings: "unslick"
//     // instead of a settings object
//   ]
// });



















$('.banner-slider2').slick({
  slidesToShow: 4,
  slidesToScroll: 2,
  autoplay: false,
  dots:false,
  arrows:false,
  autoplaySpeed: 2000,
  nextArrow:'<i class="fas fa-chevron-left  next-arrow"></i>',
  prevArrow:'<i class="fas fa-chevron-right  previous-arrow"></i>',
 

});
// 9. client-testimonial one item carousel

// $('.banner-slider2').slick({
//   slidesToShow: 1,
//   slidesToScroll: 1,
//   autoplay: true,
//   dots:true,
//   arrows:false,
//   autoplaySpeed: 2000,
//   nextArrow:'<i class="fas fa-chevron-left  next-arrow"></i>',
//   prevArrow:'<i class="fas fa-chevron-right  previous-arrow"></i>',
 
//   responsive: [
//     {
//       breakpoint: 992,
//       settings: {
    
//       }
//     },
//     {
//       breakpoint: 768,
//       settings: {
   
//       }
//     },
//     {
//       breakpoint: 576,
//       settings: {
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         dots: false
//       }
//     }
//     // You can unslick at a given breakpoint now by adding:
//     // settings: "unslick"
//     // instead of a settings object
//   ]
// });

// 1. preloader

$(window).ready(function () {
  $('#preloader').delay(500).fadeOut('fade');
});
/*==================== CHANGE BACKGROUND HEADER ====================*/
function scrollHeader(){
  const header = document.getElementById('menu')
  // When the scroll is greater than 100 viewport height, add the scroll-header class to the header tag
  if(this.scrollY >= 90) header.classList.add('scroll-header'); else header.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)
/*==================== CHANGE BACKGROUND HEADER end ====================*/

/*==================== SHOW SCROLL UP ====================*/ 
function scrollUp(){
  const scrollUp = document.getElementById('scroll-up');
  // When the scroll is higher than 200 viewport height, add the show-scroll class to the a tag with the scroll-top class
  if(this.scrollY >= 300) scrollUp.classList.add('show-scroll'); else scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp)
/*==================== SHOW SCROLL UP ====================*/ 






/*=============== SCROLL REVEAL ANIMATION ===============*/
















$(document).ready(function(){ 





  const sr = ScrollReveal({
    distance: '60px',
    duration: 2500,
    delay: 400,
    reset: true
  })
  
  sr.reveal(`. `,{delay: 400})
  sr.reveal(`.quality`,{delay: 300})
  sr.reveal(``,{delay: 400, origin: 'top'})
  
  sr.reveal(``,{origin: 'top', interval: 50})
  sr.reveal(``,{origin: 'left', interval: 50})
  
  sr.reveal(``,{origin: 'top',delay: 100})
  sr.reveal(`.moson-img`,{origin: 'top',delay: 100})
  sr.reveal(`.moson-img1`,{origin: 'top',delay: 300})
  sr.reveal(`.moson-img2`,{origin: 'top',delay: 500})
  sr.reveal(`.moson`,{origin: 'bottom',delay: 100})
  sr.reveal(`.moson1`,{origin: 'bottom',delay: 300})
  sr.reveal(`.moson2`,{origin: 'bottom',delay: 500})
  sr.reveal(`.moson3`,{origin: 'bottom',delay: 700})
  sr.reveal(`.moson4`,{origin: 'bottom',delay: 900})
  sr.reveal(`.moson5`,{origin: 'bottom',delay: 1100})
 
  









  
});  