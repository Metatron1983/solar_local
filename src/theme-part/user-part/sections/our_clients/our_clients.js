const ourClientsLeftArrowSliderBtn = document.querySelector('.our-clients__left-arrow');
const ourClientsLeftArrowSlider = document.querySelector('.js-arrow-left');
const ourClientsLeftArrowHoverSlider = document.querySelector('.js-arrow-left-hover');

const ourClientsrightArrowSliderBtn = document.querySelector('.our-clients__right-arrow');
const ourClientsRightArrowSlider = document.querySelector('.js-arrow-right');
const ourClientsRightArrowHoverSlider = document.querySelector('.js-arrow-right-hover');

ourClientsLeftArrowSliderBtn.addEventListener('mouseenter', () => {
    ourClientsLeftArrowSlider.classList.add('display-none');
    ourClientsLeftArrowHoverSlider.classList.remove('display-none');
})
ourClientsLeftArrowSliderBtn.addEventListener('mouseleave', function () {
    let focusElem = document.activeElement;
    if (focusElem !== this) {
        ourClientsLeftArrowSlider.classList.remove('display-none');
        ourClientsLeftArrowHoverSlider.classList.add('display-none');
    }
})
ourClientsLeftArrowSliderBtn.addEventListener('focus', () => {
    ourClientsLeftArrowSlider.classList.add('display-none');
    ourClientsLeftArrowHoverSlider.classList.remove('display-none');
})
ourClientsLeftArrowSliderBtn.addEventListener('blur', () => {
    ourClientsLeftArrowSlider.classList.remove('display-none');
    ourClientsLeftArrowHoverSlider.classList.add('display-none');
})

ourClientsrightArrowSliderBtn.addEventListener('mouseenter', () => {
    ourClientsRightArrowSlider.classList.add('display-none');
    ourClientsRightArrowHoverSlider.classList.remove('display-none');
})
ourClientsrightArrowSliderBtn.addEventListener('mouseleave', function () {
    let focusElem = document.activeElement;
    if (focusElem !== this) {
        ourClientsRightArrowSlider.classList.remove('display-none');
        ourClientsRightArrowHoverSlider.classList.add('display-none');
    }
})
ourClientsrightArrowSliderBtn.addEventListener('focus', () => {
    ourClientsRightArrowSlider.classList.add('display-none');
    ourClientsRightArrowHoverSlider.classList.remove('display-none');
})
ourClientsrightArrowSliderBtn.addEventListener('blur', () => {
    ourClientsRightArrowSlider.classList.remove('display-none');
    ourClientsRightArrowHoverSlider.classList.add('display-none');
})



// slider

const sliderItems = document.querySelectorAll('.our-clients__slider-item');

let currentSliderItem = 0;
let nextSliderItem = 1;
let previousSliderItem = 2;

ourClientsLeftArrowSliderBtn.addEventListener('click', () => {
    movePreviousSlideItem();
});

ourClientsrightArrowSliderBtn.addEventListener('click', () => {
    moveNextSlideItem();
});

findNotSelectionElem();

function findNotSelectionElem () {
    removeSelectionProp(sliderItems);
    for (let item of sliderItems) {
        let h2 = item.querySelectorAll('h2');
        removeSelectionProp(h2);
        let ul = item.querySelectorAll('ul');
        removeSelectionProp(ul);
        let img = item.querySelectorAll('img');
        removeSelectionProp(img);
        let div = item.querySelectorAll('div');
        removeSelectionProp(div);
        let a = item.querySelectorAll('a');
        removeSelectionProp(a);
        let button = item.querySelectorAll('button');
        removeSelectionProp(button);
    }

}
function removeSelectionProp (collectionElem) {
    for (let item of collectionElem) {
        item.onmousedown = function () {
            return false;
        }
    }
}

findDragableElem();

function findDragableElem () {
    for (let item of sliderItems) {
        let img = item.querySelectorAll('img');
        removeDragableProp(img);
        let links = item.querySelectorAll('a');
        removeDragableProp(links);
        let btns =  item.querySelectorAll('button');
        removeDragableProp(btns);
    }  
}

function removeDragableProp(collectionElem) {
    for (let item of collectionElem) {
        item.draggable = false;
    }
}

moveSliderItemHandler();

function  moveSliderItemHandler() {
    const sliderInner = document.querySelector('.our-clients__slider-inner');
    let mousedownClientX = 0;
    let elemOffsetX = 0;
    let currentMouseClientX = 0;

    let touchStartX = 0;
    let elemTouchOffsetX = 0;
    let currentTouchClientX = 0;

    sliderInner.addEventListener('mousedown', mousedownListener);
        
    function mousedownListener (event) {
        event.preventDefault();
        mousedownClientX = event.clientX; 
        this.addEventListener('mousemove', mousemoveListener);
        this.addEventListener('mouseup', mouseupListener);
    }

    function mousemoveListener (event) {
        currentMouseClientX = event.clientX;
        elemOffsetX = mousedownClientX- currentMouseClientX; 
        sliderInner.style.right = elemOffsetX + "px";
    }

    function mouseupListener (event) {
        sliderInner.removeEventListener('mousemove', mousemoveListener);
        sliderInner.style.right = 0 + "px";
        if(elemOffsetX < 0) movePreviousSlideItem();
        if(elemOffsetX > 0) moveNextSlideItem();
        if(elemOffsetX === 0) clickOnSliderItemHandler();
        sliderInner.removeEventListener('mouseup', mouseupListener);
    }

    function clickOnSliderItemHandler() {
        let windowsWidth = document.documentElement.clientWidth;
        let mouseClientX = mousedownClientX;
        if (mouseClientX < windowsWidth / 2) {
            movePreviousSlideItem();
            return;
        }
        moveNextSlideItem();
    }

    // touch 

    sliderInner.addEventListener('touchstart', touchDown);
    
    function touchDown (event) {
        touchStartX = event.touches[0].clientX;
        sliderInner.addEventListener('touchmove', touchMove);
        sliderInner.addEventListener('touchend', touchUp);
    }
    function touchMove(event) {
        event.preventDefault();
        currentTouchClientX = event.touches[0].clientX;
        elemTouchOffsetX = currentTouchClientX - touchStartX;
        sliderInner.style.left = elemTouchOffsetX + "px"; 
    }
    function touchUp(event) {
        // event.preventDefault();
        sliderInner.removeEventListener('touchmove', touchMove);
        sliderInner.style.left = 0 + "px";
        if(currentTouchClientX > 0) moveNextSlideItem();
        if(currentTouchClientX < 0) movePreviousSlideItem();
        if(currentTouchClientX === 0) touchClick(event);
        sliderInner.removeEventListener('touchend', touchUp);
    }
    function touchClick(event) {
        let windowWidth = document.documentElement.clientWidth;
        if(touchStartX > windowWidth/2) moveNextSlideItem();
        if(touchStartX <= windowWidth/2) movePreviousSlideItem();
    }
}

function moveNextSlideItem() {
    currentSliderItem = currentSliderItem + 1;
    if (currentSliderItem > 2) currentSliderItem = 0;

    nextSliderItem = nextSliderItem + 1;
    if (nextSliderItem > 2) nextSliderItem = 0;

    previousSliderItem = previousSliderItem + 1;
    if (previousSliderItem > 2) previousSliderItem = 0;

    sliderItems[currentSliderItem].classList.remove('display-none');
    sliderItems[nextSliderItem].classList.add('display-none');
    sliderItems[previousSliderItem].classList.add('display-none');
}
function movePreviousSlideItem() {
    currentSliderItem = currentSliderItem - 1;
    if (currentSliderItem < 0) currentSliderItem = 2;

    nextSliderItem = nextSliderItem - 1;
    if (nextSliderItem < 0) nextSliderItem = 2;

    previousSliderItem = previousSliderItem - 1;
    if (previousSliderItem < 0) previousSliderItem = 2;

    sliderItems[currentSliderItem].classList.remove('display-none');
    sliderItems[nextSliderItem].classList.add('display-none');
    sliderItems[previousSliderItem].classList.add('display-none');
}


