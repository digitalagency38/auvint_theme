import Glide from '@glidejs/glide';

const Solutions = class Solutions {
    constructor() {
        this.slider = null;
    }
    initSlider() {
        if (!document.querySelector('.solutions__glide')) return;
        this.slider = new Glide('.solutions__glide', {
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

export default Solutions;