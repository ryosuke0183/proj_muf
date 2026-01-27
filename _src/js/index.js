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

try {
  new Swiper(".swiper-custom", {
    slidesPerView: 1, // 一度に表示する枚数
    spaceBetween: "9.785932722%",
    freeMode: true,
    speed: 1000,

    navigation: {
      nextEl: ".swiper-custom-button-next",
      prevEl: ".swiper-custom-button-prev",
    },
    pagination: {
      el: ".swiper-custom-pagination",
      bulletClass: "swiper-custom-pagination__dot",
      clickable: true,
    },

    breakpoints: {
      751: {
        slidesPerView: 2.9,
        spaceBetween: "2.857142857%",
      },
    },
  });
} catch (error) {
  console.log(error);
}

try {
  new Swiper(".swiper-custom-loop", {
    slidesPerView: 1.3,
    spaceBetween: "9.785932722%",
    freeMode: true,
    // loop: true,
    speed: 1000,
    centeredSlides: true,

    navigation: {
      nextEl: ".swiper-custom-button-next",
      prevEl: ".swiper-custom-button-prev",
    },
    pagination: {
      el: ".swiper-custom-pagination",
      bulletClass: "swiper-custom-pagination__dot",
      clickable: true,
    },

    breakpoints: {
      751: {
        slidesPerView: 3.1,
        spaceBetween: "2.857142857%",
        loop: false,
        centeredSlides: false,
      },
    },
  });
} catch (error) {
  console.log(error);
}

try {
  const HTML = document.querySelector("html");
  window.addEventListener("scroll", function () {
    if (window.scrollY >= 100) {
      HTML.classList.add("js-scrolled");
    } else {
      HTML.classList.remove("js-scrolled");
    }
  });
} catch (error) {
  console.log(error);
}
