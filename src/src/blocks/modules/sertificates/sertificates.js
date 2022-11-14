import Glide from '@glidejs/glide';

const Sertificates = class sertificates {
    constructor() {
        this.slider = null;
        this.index = 0;
    }
    initSlider() {
        if (!document.querySelector('.sertificates__slider')) return;
        this.slider = new Glide('.sertificates__slider', {
            perView: 4,
            gap: 20,
            swipeThreshold: false,
            dragThreshold: false,
            breakpoints: {
                1280: {
                    perView: 2,
                    gap: 16,
                    swipeThreshold: 200,
                    dragThreshold: 200,
                },
                860: {
                    perView: 1,
                    gap: 16,
                    swipeThreshold: 200,
                    dragThreshold: 200,
                }
            }
        }).mount();
        this.slider.on(['run'], () => {
            this.index = this.slider.index;
        })
    }
    init() {
        this.initSlider();
    }
};

export default Sertificates;