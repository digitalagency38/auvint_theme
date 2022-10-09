import Glide from '@glidejs/glide';

const Production = class Production {
    constructor() {
        this.slider = null;
    }
    initSlider() {
        if (!document.querySelector('.production__slider')) return;
        this.slider = new Glide('.production__slider', {
            slidesToShow: 2,
            gap: 16,
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
        }).mount()
    }
    init() {
        this.initSlider();
    }
}

export default Production;