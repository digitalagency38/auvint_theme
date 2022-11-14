import Glide from '@glidejs/glide';

const Projects = class Projects {
    constructor() {
        this.slider = null,
        this.index = 0;
    }
    initSlider() {
        if (!document.querySelector('.projects__slider')) return;
        this.slider = new Glide('.projects__slider', {
            perView: 3,
            gap: 20,
            type: 'slider',
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

export default Projects;