document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.js-projects-cards-simple-slider', {
        direction: 'vertical',
        slidesPerView: 'auto',
        spaceBetween: 32,
        allowTouchMove: false,
        watchOverflow: false,

        breakpoints: { 
            992: {
                direction: 'horizontal',
                slidesPerView: 3,
                effect: 'slide', 
                spaceBetween: 32,

                navigation: {
                    nextEl: '.js-button-next',
                    prevEl: '.js-button-prev',
                },
            },
            1200: {
                direction: 'horizontal',
                slidesPerView: 4,
                effect: 'slide', 
                spaceBetween: 32,

                navigation: {
                    nextEl: '.js-button-next',
                    prevEl: '.js-button-prev',
                },
                spaceBetween: 56,
            },

            },
            
    });
});