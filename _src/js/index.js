import Hamburger from "./module/hamburger.js";

// ハンバーガー
try {
  const hamburger = new Hamburger(document.querySelector(".hamburger"));
  hamburger.toggleHamburger();
  hamburger.clickAnchor();
} catch (error) {
  console.log(error);
}

try {
  document.querySelectorAll('a[href*="#"]').forEach((el) => {
    el.addEventListener("click", function (e) {
      const URL = e.target.getAttribute("href").replace("/", "");
      const target = document.querySelector(URL);
      if (!target) return;
      e.preventDefault();

      const headerHeight = document.querySelector("header").offsetHeight;
      const targetPos = target.getBoundingClientRect().top + window.pageYOffset;

      window.scrollTo({
        top: targetPos - headerHeight,
        behavior: "smooth",
      });
    });
  });
} catch (error) {
  console.log(error);
}

// try {
//   new Swiper(".swiper-custom", {
//     slidesPerView: 1, // 一度に表示する枚数
//     spaceBetween: "9.785932722%",
//     freeMode: true,
//     speed: 1000,

//     navigation: {
//       nextEl: ".swiper-custom-button-next",
//       prevEl: ".swiper-custom-button-prev",
//     },
//     pagination: {
//       el: ".swiper-custom .swiper-custom-pagination",
//       bulletClass: "swiper-custom-pagination__dot",
//       clickable: true,
//     },

//     breakpoints: {
//       751: {
//         slidesPerView: 2.9,
//         spaceBetween: "2.857142857%",
//       },
//     },
//   });
// } catch (error) {
//   console.log(error);
// }

// try {
//   new Swiper(".swiper-custom-loop", {
//     slidesPerView: 1.3,
//     spaceBetween: "9.785932722%",
//     freeMode: true,
//     // loop: true,
//     speed: 1000,
//     centeredSlides: true,

//     navigation: {
//       nextEl: ".swiper-custom-button-next",
//       prevEl: ".swiper-custom-button-prev",
//     },
//     pagination: {
//       el: ".swiper-custom-loop .swiper-custom-pagination",
//       bulletClass: "swiper-custom-pagination__dot",
//       clickable: true,
//     },

//     breakpoints: {
//       751: {
//         slidesPerView: "auto",
//         // slidesPerView: 3.1,
//         // slidesPerGroup: 1,
//         spaceBetween: "2.857142857%",
//         loop: false,
//         centeredSlides: false,
//       },
//     },
//   });
// } catch (error) {
//   console.log(error);
// }

try {
  const $SLIDER_STORE = $(".slick-online-store .slick-custom__core");
  const $SLIDER_MEDIA = $(".slick-media .slick-custom__core");

  $SLIDER_STORE.slick({
    dots: true,
    arrows: false,
    variableWidth: true,
    focusOnSelect: true,
    infinite: false,

    responsive: [
      {
        breakpoint: 750,
        settings: {
          arrows: true,
          prevArrow:
            '<div class="slick-custom-button-prev slick-custom-button"><i class="fa-solid fa-arrow-left"></i></div>',
          nextArrow:
            '<div class="slick-custom-button-next slick-custom-button"><i class="fa-solid fa-arrow-right"></i></div>',
          centerMode: true,
        },
      },
    ],
  });

  $SLIDER_MEDIA.slick({
    dots: true,
    arrows: false,
    variableWidth: true,
    focusOnSelect: true,
    infinite: false,

    responsive: [
      {
        breakpoint: 750,
        settings: {
          arrows: true,
          infinite: true,
          prevArrow:
            '<div class="slick-custom-button-prev slick-custom-button"><i class="fa-solid fa-arrow-left"></i></div>',
          nextArrow:
            '<div class="slick-custom-button-next slick-custom-button"><i class="fa-solid fa-arrow-right"></i></div>',
          centerMode: true,
          centerPadding: "20%",
        },
      },
    ],
  });
} catch (error) {
  console.log(error);
}

try {
  const HTML = document.querySelector("html");
  const SEC_MV = document.querySelector(".section-mv");

  const OBSERVER = new IntersectionObserver((entries) => {
    entries.forEach(
      (entry) => {
        if (entry.isIntersecting) {
          HTML.classList.remove("js-scrolled");
        } else {
          HTML.classList.add("js-scrolled");
        }
      },
      {
        root: null,
        threshold: 1.0,
      },
    );
  });

  OBSERVER.observe(SEC_MV);

  // window.addEventListener("scroll", function () {
  //   let sectionMvRect = SEC_MV.getBoundingClientRect();

  //   if (window.scrollY >= 100) {
  //     HTML.classList.add("js-scrolled");
  //   } else {
  //     HTML.classList.remove("js-scrolled");
  //   }
  // });
} catch (error) {
  console.log(error);
}
