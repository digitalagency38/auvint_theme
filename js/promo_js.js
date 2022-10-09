document.addEventListener('DOMContentLoaded', function(){
    const ITEMS_COUNT_PER_CLICK = 12;

    const showButton = document.querySelector('.projects__button__more');
    const items = document.querySelectorAll('.projects__slide');
    const itemsCount = items.length;
    let i = ITEMS_COUNT_PER_CLICK;

    for (; i < itemsCount; ++i) {
    items[i].style.display = 'none';
    }

    i = ITEMS_COUNT_PER_CLICK;

    const callback = (event) => {
    if (i >= itemsCount) {
    alert('Больше товаров нет!');
    showButton.removeEventListener('click', callback);
    showButton.outerHTML = '';
    return;
    }

    items[i++].style.display = '';  
    items[i++].style.display = '';  
    items[i++].style.display = '';  
    if (i < itemsCount) {
    items[i++].style.display = '';
    }
    };

    showButton.addEventListener('click', callback);
});