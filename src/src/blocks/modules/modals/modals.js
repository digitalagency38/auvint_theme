const Modals = class Modals {
    constructor({modalsSelector, modalsOpenerSelector, openedClass}){
        this.modalsSelector = modalsSelector;
        this.modalsOpenerSelector = modalsOpenerSelector;
        this.openedClass = openedClass;
    }
    openModal(id) {
        if (!document.querySelector(`[${this.modalsSelector}="${id}"]`)) return;
        document.querySelector(`[${this.modalsSelector}="${id}"]`).classList.add(this.openedClass);
        let productLink = document.querySelector(`[data-modal-id="${id}"]`).dataset.productLink;
        document.querySelector(`[${this.modalsSelector}="${id}"] #prodLink`).value = productLink;
    }
    closeModal(id) {
        if (!document.querySelector(`[${this.modalsSelector}="${id}"]`)) return;
        document.querySelector(`[${this.modalsSelector}="${id}"]`).classList.remove(this.openedClass);
    }
    addClickListener() {
        document.addEventListener('click', (event) => {
            if (event.target.dataset.modalId) {
                event.preventDefault();
                this.openModal(event.target.dataset.modalId);
            }
            if (!event.target.dataset.modalId && event.target.dataset.modal) {
                event.preventDefault();
                this.closeModal(document.querySelector(`[${this.modalsSelector}].isOpened`).dataset.modal);
            }
        })
    }
    addKeyupListener() {
        document.addEventListener('keyup', (event) => {
            if (event.keyCode === 27 && document.querySelector(`[${this.modalsSelector}].isOpened`)) {
                this.closeModal(document.querySelector(`[${this.modalsSelector}].isOpened`).dataset.modal);
            }
        })
    }
    closeAllModals() {
        document.querySelectorAll('.modal.isOpened').forEach(element => {
            element.classList.remove('isOpened');
        })
    }
    init() {
        if (!this.modalsSelector && this.modalsOpenerSelector) return;
        this.addClickListener();
        this.addKeyupListener();

        document.addEventListener( 'wpcf7mailsent', function( event ) {
            // ga( 'send', 'event', 'Contact Form', 'submit' );
            if (event.target.closest('.modal__form')) {
                event.target.closest('.modal__form').classList.add('isSent');
            }
            if (event.target.closest('.formBlock')) {
                event.target.closest('.formBlock').classList.add('isSent');
            }
            if (event.target.closest('.contactsForm')) {
                event.target.closest('.contactsForm').classList.add('isSent');
            }
        }, false );
    }
}

export default Modals;