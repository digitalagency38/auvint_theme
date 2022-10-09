import * as globalFunctions from './modules/functions.js';
globalFunctions.isWebp();

import Vue from 'vue/dist/vue.js';

import Header from '../blocks/modules/header/header.js';
import Modals from '../blocks/modules/modals/modals.js';
import MainSlider from '../blocks/modules/main_slider/main_slider.js';
import Projects from '../blocks/modules/projects/projects.js';
import Categories from '../blocks/modules/categories/categories.js';
import Benefits from '../blocks/modules/benefits/benefits.js';
import Clients from '../blocks/modules/clients/clients.js';
import Sertificates from '../blocks/modules/sertificates/sertificates.js';
import News from '../blocks/modules/news/news.js';
import Solutions from '../blocks/modules/solutions/solutions.js';
import Production from '../blocks/modules/production/production.js';
import About from '../blocks/modules/about/about.js';
import PortfolioSlider from '../blocks/modules/portfolio_slider/portfolio_slider.js';

window.app = new Vue({
    el: '#app',
    data: () => ({
        isMounted: false,
        sizes: {
            tablet: 1024,
            mobile: 768,
            window: window.innerWidth
        },
        header: new Header({
            someVareible: 'someVareible'
        }),
        modals: new Modals({
            modalsSelector: "data-modal",
            modalsOpenerSelector: "data-modal-id",
            openedClass: "isOpened"
        }),
        mainSlider: new MainSlider(),
        projects: new Projects(),
        categories: new Categories(),
        benefits: new Benefits(),
        clients: new Clients(),
        sertificates: new Sertificates(),
        news: new News(),
        solutions: new Solutions(),
        production: new Production(),
        about: new About(),
        portfolioSlider: new PortfolioSlider(),
        isLoaded: false
    }),
    beforeMount() {        
        window.addEventListener('resize', () => {
            this.sizes.window = window.innerWidth;
        });
    },
    mounted() {
        this.isMounted = true;
        this.header.init();
        this.modals.init();
        this.mainSlider.init();
        this.projects.init();
        this.categories.init();
        this.benefits.init();
        this.clients.init();
        this.sertificates.init();
        this.news.init();
        this.solutions.init();
        this.production.init();
        this.portfolioSlider.init();
        console.log(this.clients);

        document.onreadystatechange = () => {
            if (document.readyState == "complete") {
                console.log('tratata');
                this.isLoaded = true
            }
        }
    },
    computed: {
        isMobile: function () {
            return this.sizes.window < this.sizes.mobile;
        },
        isTablet: function () {
            return this.sizes.window < this.sizes.tablet && this.sizes.window > this.sizes.mobile;
        }
    },
});