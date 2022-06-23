// маска +7 (___)-___-__-__ появляеся при фокусе на инпуте
//при вводе первой цифры появляется маска;
// ввод +, 7, 8 первыми символами автоматически заменяется на + 7
// со второго символа символы кроме цифр игнорируются (включая проблеы)
//вставка в середину цифр изменяет порядок
//вставка после + значения отличного от 7 игнорируется.
//Удаление элементов маски возвращает их назад
//каждая новая цивра удаляет символ подчеркивания
function tellInputMaskModule() {

    const mask = ['+', '7', '(', '_', '_', '_', ')', '-', '_', '_', '_', '-', '_', '_', '-', '_', '_'];

    const inputPhoneMask = document.querySelector('.footer-request__input-phone');

    inputPhoneMask.addEventListener('focus', setPhoneNumber);

    function setPhoneNumber() {
        let cursorPosition = 3
        let currentInputValue = inputPhoneMask.value;
        if (currentInputValue.length === 0) {
            inputPhoneMask.value = mask.join('');
            setCursorOnPosition(this, cursorPosition);
        }
    }

    const setCursorOnPosition = (obj, numberOfPosition) => {
        setTimeout(() => {
            obj.selectionStart = obj.selectionEnd = numberOfPosition;
        });
    };

    inputPhoneMask.addEventListener('input', inputPhone);
    let currentPhoneData = '';
    let lastValue = '';
    let lastValueLength = 0;
    let currentCursorPosition;
    let currentCursorPositionLength;

    function inputPhone(event) {
        currentPhoneData = inputPhoneMask.value;
        lastValue = currentPhoneData;
        currentPhoneData = removeSpaces(currentPhoneData);
        currentPhoneData = findEndRemoveNotNumChar(currentPhoneData);
        currentCursorPositionLength = currentPhoneData.length;
        currentPhoneData = matchMask(currentPhoneData);
        cursorPosition(this);

        inputPhoneMask.value = currentPhoneData;
        lastValue = findEndRemoveNotNumChar(currentPhoneData);


        lastValueLength = lastValue.length;
    }

    function removeSpaces(frase) {
        let spaces = /\s/g;
        frase = frase.replace(spaces, '');
        return frase;
    }
    function findEndRemoveNotNumChar(frase) {
        const notNumRegExp = /[^0-9]/g;
        const firstSevenEшпреRegExp = /^[7-8]/;
        frase = frase.replace(notNumRegExp, '');
        frase = frase.replace(firstSevenEшпреRegExp, '');
        return frase;
    }

    let fraseLengthMaxIndex = 0;
    let currentFraseLengthIndex = 0;

    function matchMask(frase) {
        fraseLengthMaxIndex = 0;
        currentFraseLengthIndex = 0;
        fraseLengthMaxIndex = frase.length - 1;
        let result = '';
        for (let index in mask) {
            switch (true) {
                case (index < 3):
                case (index == 6):
                case (index == 7):
                case (index == 11):
                case (index == 14):
                    result += mask[index];
                    break;
                case (index >= 3 && index < 6):
                case (index >= 8 && index < 11):
                case (index >= 12 && index < 14):
                case (index > 14 && index <= 16):
                    result += setChar(result, frase, index);
                    break;
            }
        }
        frase = result;
        return frase;
    }
    function cursorPosition(obj) {
        switch (true) {
            case (currentCursorPositionLength == 0):
                currentCursorPosition = 3;
                break;
            case (currentCursorPositionLength == 1):
                currentCursorPosition = 4;
                break;
            case (currentCursorPositionLength == 2):
                currentCursorPosition = 5;
                break;
            case (currentCursorPositionLength == 3):
                currentCursorPosition = 6;
                break;
            case (currentCursorPositionLength == 4):
                currentCursorPosition = 9;
                break;
            case (currentCursorPositionLength == 5):
                currentCursorPosition = 10;
                break;
            case (currentCursorPositionLength == 6):
                currentCursorPosition = 11;
                break;
            case (currentCursorPositionLength == 7):
                currentCursorPosition = 13;
                break;
            case (currentCursorPositionLength == 8):
                currentCursorPosition = 14;
                break;
            case (currentCursorPositionLength == 9):
                currentCursorPosition = 16;
                break;
            case (currentCursorPositionLength == 10):
                currentCursorPosition = 17;
                break;
        }
        setTimeout(() => {
            obj.selectionStart = obj.selectionEnd = currentCursorPosition;
        });
    }
    function setChar(result, frase, index) {
        switch (true) {
            case (frase.length == 0):
                result = mask[index];
                break;
            case (currentFraseLengthIndex <= fraseLengthMaxIndex):
                result = frase[currentFraseLengthIndex];
                currentFraseLengthIndex += 1;
                break;
            case (currentFraseLengthIndex > fraseLengthMaxIndex):
                result = mask[index];
                currentFraseLengthIndex += 1;
                break;
        }
        return result;
    }
}

tellInputMaskModule();
