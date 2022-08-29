require("./bootstrap");
// require("./ckeditor");
// import Alpine from "alpinejs";
// window.Alpine = Alpine;
// Alpine.start();

// import Swiper JS
// import Swiper from "swiper";
// import Swiper bundle with all modules installed
import Swiper from "swiper/bundle";

// import styles bundle
// import "swiper/css/bundle";

const swiper = new Swiper(".newsSlider", {
    // Optional parameters
    // direction: "vertical",
    loop: true,

    // If we need pagination
    pagination: {
        el: ".sliderPagination",
        clickable: true,
        dynamicBullets: true,
    },

    // Navigation arrows
    navigation: {
        nextEl: ".goForNext",
        prevEl: ".goForPrev",
    },

    // And if we need scrollbar
    // scrollbar: {
    //     el: ".swiper-scrollbar",
    // },

    slidesPerView: 1,
    spaceBetween: 0,
    freeMode: true,

    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 0,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 0,
        },
    },
});
