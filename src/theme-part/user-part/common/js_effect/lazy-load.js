
const makeObservers = function() {
    const observers = [];

    const addObservers = function(observer) {
        observers.push(observer);
    }
    const noifyObservers = function() {
        for (let observer of observers) {
            observer();
        }
    }
    return {
        addObservers: addObservers,
        noifyObservers: noifyObservers,
    }
}

const lazyLoadModel = function() {
    let windowHeight = document.documentElement.clientHeight;
    let windowTop = window.pageYOffset;
    let windowBottom = windowTop + windowHeight;
    let lazyLoadElements = document.querySelectorAll('.js-lazy-load-section');
    const observer = makeObservers();

    const addScrollListener = function() {
        document.addEventListener('scroll', function() {
            windowTop = window.pageYOffset;
            windowHeight = document.documentElement.clientHeight;
            windowBottom = windowTop + windowHeight;
            observer.noifyObservers();
        });
    }
    const createLazyLoadObjList = function() {
        for (let item of lazyLoadElements) {
            let lazyLoadObj = createLazyLoadObj(item);
            observer.addObservers(lazyLoadObj.showElem);
        }
        observer.noifyObservers();
    }

    const createLazyLoadObj = function(lazyLoadObj) {
        const elem = lazyLoadObj;
        const elemTop = lazyLoadObj.getBoundingClientRect().top + windowTop;
        const elemBottom = lazyLoadObj.getBoundingClientRect().bottom + windowTop;
        const elemTopPosition = lazyLoadObj.getBoundingClientRect().top;
        const elemBottomPosition = lazyLoadObj.getBoundingClientRect().bottom;
        const showElem = function() {
            if (elemTop < windowBottom && elemTop >= windowTop) {
                showContent(elem);
            }
            if (elemBottom < windowBottom && elemBottom > windowTop) {
                showContent(elem);
            }
            if (elemBottom > windowBottom && elemTop < windowTop) {
                showContent(elem);
            }

        }
        return {
            elem: elem,
            elemTop: elemTop,
            elemBottom: elemBottom,
            elemTopPosition: elemTopPosition,
            elemBottomPosition: elemBottomPosition,
            showElem: showElem,
        }
    }

    const showContent = function(elem) {
        const contentItemsSrc = elem.querySelectorAll('[data-src]');
        const contentItemsSrcset = elem.querySelectorAll('[data-srcset]');

        for (let item of contentItemsSrc) {
            let src = item.getAttribute('data-src');
            item.setAttribute('src', src);
            item.removeAttribute('data-src');
        }
        for (let item of contentItemsSrcset) {
            let srcset = item.getAttribute('data-srcset');
            item.setAttribute('srcset', srcset);
            item.removeAttribute('data-srcset');
        }
    }




const build = () => {
    addScrollListener();
    createLazyLoadObjList();
}
build();
}

lazyLoadModel();

