import {handleInputErrors, handleButtonSpinner, displayResponseMessage, formDataToJson} from '../components/helpers.js';

export default class Login {

    constructor(spinner, button, message, form) {
        this.spinner = spinner;
        this.button = button;
        this.message = message;
        this.form = form;
    }

    async submit() {
        this.button.setAttribute('disabled', true);
        this.spinner.classList.remove('d-none');
        this.message.classList.contains('d-none') ? '' : this.message.classList.remove('d-none');
        const settings = {method: 'post', body: new FormData(this.form), headers: new Headers()};
        try {
            const result = await fetch(this.form.dataset.action, settings).then((response) => response.json());
            return await this.process(result);
        }catch(error) {
            handleButtonSpinner(this.button, this.spinner); 
            alert('Unknown Error. Try Again');
        }
            
    }

    process(response) {
        if (typeof response === 'string' || response === null) {
            handleButtonSpinner(this.button, this.spinner); 
        }else if(response.status === 'empty-email') {
            handleButtonSpinner(this.button, this.spinner);
            handleInputErrors(document.querySelector('.email'), document.querySelector('.email-error'), 'Email is required');

        }else if(response.status === 'empty-password') {
            handleButtonSpinner(this.button, this.spinner);
            handleInputErrors(document.querySelector('.password'), document.querySelector('.password-error'), 'Password is required');

        }else if (response.status === 'access-denied') {
            handleButtonSpinner(this.button, this.spinner);
            displayResponseMessage(this.message, ['alert-danger'], ['d-none'], 'Access Denied');
        }else {
            alert('Network Error. Try Again');
        }
    }

}