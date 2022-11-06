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
            breakpoints: {
                1280: {
                    perView: 2,
                    gap: 16,
                },
                860: {
                    perView: 1,
                    gap: 16,
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