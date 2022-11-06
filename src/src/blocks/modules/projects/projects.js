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
            console.log(this.index);
        })
    }
    init() {
        this.initSlider();
    }
};

export default Projects;