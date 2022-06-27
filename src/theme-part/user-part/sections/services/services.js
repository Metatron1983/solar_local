function modelAccordion() {
    const section = document.querySelector('.services');
    const textBoxes = section.querySelectorAll('.services__text-box');
    const textInner = document.querySelector(".services__text-inner");

    textInner.addEventListener("click", (event) => {
        if(document.documentElement.clientWidth > 850) return;
        
        let target = undefined;
        if (event.target.classList.contains('services__text-box')) {
            target = event.target;
            accordionAction(target);
            
        } 
        if (event.target.parentElement.classList.contains('services__text-box')) {
            target = event.target.parentElement;
            accordionAction(target);
        } 
    }, {passive:true});

    function accordionAction(domElem) {
        if (domElem.classList.contains('services__text-box--active')){
            domElem.classList.remove('services__text-box--active');
            return;
        }
        for (let item of textBoxes) {
            item.classList.remove('services__text-box--active');
            let itemText = item.querySelector('.content__text');
            itemText.classList.remove('animated__fadein-up__1s');
            itemText.classList.remove('fadein-up__1s');
        }
        domElem.classList.add('services__text-box--active');
    }
}
modelAccordion();

