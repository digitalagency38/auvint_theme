import Glide from '@glidejs/glide';

const PortfolioSlider = class PortfolioSlider {
    constructor() {
        this.slider = null;
        this.index = 0;
    }
    initSlider() {
        if (!document.querySelector('.portfolioSlider__glide')) return;

        this.slider = new Glide('.portfolioSlider__glide', {
            perView: 1,
            gap: 20,
            startAt: 1
        }).mount();

        this.slider.on(['run'], () => {
            this.index = this.slider.index;
        })
    }
    init() {
        this.initSlider();
    }
}

export default PortfolioSlider;