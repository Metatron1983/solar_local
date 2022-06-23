jQuery(document).ready(function ($) {
    const formRequest = (nameForm, phoneForm) => {
        var data = {
            action: 'send_form_data',
            user_name: nameForm,
            user_phone: phoneForm
        };
        
        $.post( MyAjax.ajaxurl, data)
            .done(function(response) {
               console.log(response);
            })
            .fail(function( xhr, status, error) {
                console.log( xhr );
                console.log( status );
                console.log( error );
            })
    }    

    const form = document.querySelector('.footer-request__form');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const formData = new FormData(form);
        const nameForm = formData.get('request[name]');
        const phoneForm = formData.get('request[phone]');

        formRequest(nameForm, phoneForm);
        const inputName = form.querySelector('.footer-request__input-name');
        const inputPhone = form.querySelector('.footer-request__input-phone');
        inputName.value = '';
        inputPhone.value = '';
    })

});