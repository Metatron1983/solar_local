let inputNameElem = document.querySelector('.footer-request__input-name');
let lastData = '';

inputNameElem.addEventListener('input', inputName);

function inputName(event) {
    lastData = inputNameElem.value;
    lastData = trimmer(lastData);
    lastData = findEndRemoveNotRussianChar(lastData);
    lastData = capitalFirstChar(lastData);
    
    
    inputNameElem.value = lastData;
}

function findEndRemoveNotRussianChar(frase) {
    const notRussianRegExp = /[^А-Яа-я]/g;
    frase = frase.replace(notRussianRegExp, '');
    return frase;

}
function trimmer(frase) {
    frase = frase.trim();
    let spaces = /\s/g;
    frase = frase.replace(spaces, '');
    return frase;
}

function capitalFirstChar(frase){
    if(!frase) return frase;
    frase = frase[0].toUpperCase() + frase.slice(1);
    return frase;
}
