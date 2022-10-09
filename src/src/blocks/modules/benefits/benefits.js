import Glide from '@glidejs/glide';

const Benefits = class Benefits {
    constructor() {
        // this.topSlider = null;
        this.bottomSlider = null;
        this.index = 0;
    }
    // initTopSlider() {
    //     if (!document.querySelector('.benefits__top_glide')) return;
    //     this.topSlider = new Glide('.benefits__top_glide', {
    //         perView: 1,
    //         gap: 20,
    //         startAt: 1,
    //         breakpoints: {
    //             1280: {
    //                 startAt: 0,
    //             }
    //         }
    //     }).mount();
    // }
    initBottomSlider() {
        if (!document.querySelector('.benefits__bottom_glide')) return;

        this.bottomSlider = new Glide('.benefits__bottom_glide', {
            perView: 1,
            gap: 20,
            startAt: 1,
            breakpoints: {
                1280: {
                    startAt: 0,
                }
            }
        }).mount();

        // if (!document.querySelector('.benefits__top_glide')) return;

        // this.topSlider.on(['run'], () => {
        //     // console.log(this.topSlider.index);
        //     this.bottomSlider.go(`=${this.topSlider.index}`);
        // });
        this.bottomSlider.on(['run'], () => {
            this.index = this.bottomSlider.index;
        })
    }
    init() {
        // this.initTopSlider();
        this.initBottomSlider();        
    }
};

export default Benefits;