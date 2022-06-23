const requestLinks = document.querySelectorAll('a.request_btn');
const targetElem = document.querySelector('#footer');
const targetFocusElem = document.querySelector('.footer-request__input-name');

requestLinks.forEach((item)=>{
    item.addEventListener('click', function(e) {
        e.preventDefault();
        const topOffset = 0;
        const elemPosition = targetElem.getBoundingClientRect().top;
        const offsetPosition = elemPosition - topOffset;
        window.scrollBy({
            top: offsetPosition,
            behavior: 'smooth',
        });
        targetFocusElem.focus({preventScroll:true});
    });
});