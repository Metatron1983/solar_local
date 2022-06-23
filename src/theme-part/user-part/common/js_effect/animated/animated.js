
const makeObservers = function () {
    const observers = [];

    const addObservers = function (observer) {
        observers.push(observer);
    }
    const noifyObservers = function () {
        for (let observer of observers) {
            observer();
        }
    }
    return {
        addObservers: addObservers,
        noifyObservers: noifyObservers,
    }
}

const animationModel = function () {
    let windowHeight = document.documentElement.clientHeight;
    let windowTop = window.pageYOffset;
    let windowBottom = windowTop + windowHeight;
    let animateElementFadeInUp = document.querySelectorAll('.animated__fadein-up__1s');
    let animateElementFadeInLeft = document.querySelectorAll('.animated__fadein-left__1s');
    let animateElementFadeInRight = document.querySelectorAll('.animated__fadein-right__1s');
    let animateElementFadeIn = document.querySelectorAll('.animated__fadein__1s');
    let animateElementScaleRight = document.querySelectorAll('.animated__scale-right__3s');
    let animateElementScaleLeft = document.querySelectorAll('.animated__scale-left__3s');
    const observer = makeObservers();

    const addScrollListener = function () {
        document.addEventListener('scroll', function () {
            windowTop = window.pageYOffset;
            windowHeight = document.documentElement.clientHeight;
            windowBottom = windowTop + windowHeight;
            observer.noifyObservers();
        });
    }
    const createAnimatedObjList = function (animatedList) {
        for (let item of animatedList) {
            let animateObj = createAnimateObj(item);
            observer.addObservers(animateObj.playing);
        }
        
    }
    
    const createAnimateObj = function (animateObj) {
        const elem = animateObj;
        const elemTop = animateObj.getBoundingClientRect().top + windowTop;
        let elemBottom = animateObj.getBoundingClientRect().bottom + windowTop;
        const elemTopPosition = animateObj.getBoundingClientRect().top;
        const elemBottomPosition = animateObj.getBoundingClientRect().bottom;
        const playing = function () {
            elemBottom = animateObj.getBoundingClientRect().bottom + windowTop;
            if (elemTop < (windowBottom - 20) && elemTop >= (windowTop)) {
                animatePlaying(elem);
            }
            if (elemBottom < windowBottom && elemBottom > (windowTop + 50)) {
                animatePlaying(elem);
            }
            if (elemBottom > (windowBottom - 20) && elemTop < windowTop) {
                animatePlaying(elem);
            }

        }
        return {
            elem: elem,
            elemTop: elemTop,
            elemBottom: elemBottom,
            elemTopPosition: elemTopPosition,
            elemBottomPosition: elemBottomPosition,
            playing: playing,
        }
    }

    const animatePlaying = function (elem) {
        switch (true) {
            case elem.classList.contains('animated__fadein-up__1s'):
                elem.classList.add("fadein-up__1s");
                break;
            case elem.classList.contains('animated__fadein-left__1s'):
                elem.classList.add("fadein-left__1s");
                break;
            case elem.classList.contains('animated__fadein-right__1s'):
                elem.classList.add("fadein-right__1s");
                break;
            case elem.classList.contains('animated__fadein__1s'):
                elem.classList.add("fadein__1s");
                break;
            case elem.classList.contains('animated__scale-right__3s'):
                elem.classList.add("scale-right__3s");
                break;
            case elem.classList.contains('animated__scale-left__3s'):
                elem.classList.add("scale-left__3s");
                break;
        }
    }

    const build = () => {
        addScrollListener();
        createAnimatedObjList(animateElementFadeInUp);
        createAnimatedObjList(animateElementFadeInLeft);
        createAnimatedObjList(animateElementFadeInRight);
        createAnimatedObjList(animateElementFadeIn);
        createAnimatedObjList(animateElementScaleRight);
        createAnimatedObjList(animateElementScaleLeft);
        observer.noifyObservers();
    }
    build();
}

animationModel();