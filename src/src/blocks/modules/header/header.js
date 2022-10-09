const Header = class Header {
    constructor(){
        this.isModalOpened = false;
        this.isMobileMenuOpened = false;
        this.isMobileCatalogOpened = false;
        this.isMobileSearchOpened = false;
        this.isMobilePhonesOpened = false;
    }
    toggleModal() {
        this.isModalOpened = !this.isModalOpened;
        this.isMobileMenuOpened = false;
        this.isMobileCatalogOpened = false;
        this.isMobileSearchOpened = false;
        this.isMobilePhonesOpened = false;
    }
    toggleMobileMenu() {
        this.isMobileMenuOpened = !this.isMobileMenuOpened;
        this.isMobileCatalogOpened = false;
        this.isMobileSearchOpened = false;
        this.isMobilePhonesOpened = false;
    }
    toggleMobileCatalog() {
        this.isMobileCatalogOpened = !this.isMobileCatalogOpened;
    }
    toggleMobileSearch() {
        this.isMobileSearchOpened = !this.isMobileSearchOpened;
        this.isMobileMenuOpened = false;
        this.isMobileCatalogOpened = false;
        this.isMobilePhonesOpened = false;
    }
    toggleMobilePhones() {
        this.isMobilePhonesOpened = !this.isMobilePhonesOpened;
        this.isMobileMenuOpened = false;
        this.isMobileCatalogOpened = false;
        this.isMobileSearchOpened = false;
    }
    countMobileMenuHeight() {
        if (!document.querySelector('.header__mobileMenu')) return;
        
        let panelHeight = 0;
        let headerHeight = document.querySelector('.header').offsetHeight;

        if (document.querySelector('#wpadminbar')) {
            panelHeight = document.querySelector('#wpadminbar').offsetHeight;
        };
        document.querySelector('.header__mobileMenu').style.height = `calc(100vh - ${panelHeight + headerHeight}px)`
        
    }
    toggleFooterMenu() {
        if (window.innerWidth > 860) return;
        document.querySelectorAll('.footer__mobile_menu ul').forEach(item => {
            item.querySelector('li:first-child a').addEventListener('click', (event) => {
                event.target.closest('li').classList.toggle('isOpened');
                if (event.target.closest('li').classList.contains('isOpened')) {
                    console.log('tratata');
                    event.preventDefault();
                } else {
                    console.log(event.target.href);
                }
            })
        })
    }
    toggleMobileMenuLinks() {
        if (window.innerWidth > 860) return;
        document.querySelectorAll('.header__mobile_links > ul > li.menu-item-has-children').forEach(item => {
            item.querySelector('a').addEventListener('click', (event) => {
                event.target.closest('li').classList.toggle('isOpened');
                if (event.target.closest('li').classList.contains('isOpened')) {
                    console.log('tratata');
                    event.preventDefault();
                } else {
                    console.log(event.target.href);
                }
            })
        })
    }
    init() {
        this.countMobileMenuHeight();
        this.toggleFooterMenu();
        this.toggleMobileMenuLinks();
        window.addEventListener('resize', () => {
            this.countMobileMenuHeight();
        })
    }
}

export default Header;