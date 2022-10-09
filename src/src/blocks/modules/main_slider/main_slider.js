import Glide from '@glidejs/glide';

const MainSlider = class MainSlider {
    constructor() {
        this.slider = new Glide('.glide.main-slider__glide', {
            gap: 0,
            autoplay: 4000,
            animationDuration: 500,
            hoverpause: false
        });
    }
    initSlider() {
        if (!document.querySelector('.glide.main-slider__glide')) return;
        this.calcLineAnimation();
        this.slider.mount();
    }
    calcLineAnimation() {
        this.slider.on('run.before', function() {
            console.log('before');
            document.querySelector('.main-slider__line').classList.remove('isActive');
        })
        this.slider.on(['run.after', 'mount.after'], function() {
            document.querySelector('.main-slider__line').classList.add('isActive');
        })
    }
    init() {
        this.initSlider();
    }
}

export default MainSlider;