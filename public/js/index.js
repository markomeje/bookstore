import {elements} from './components/selectors.js';
import Login from './models/Login.js';

document.addEventListener('DOMContentLoaded', () => {
    const login = new Login(elements.loginSpinner, elements.loginButton, elements.loginMessage, elements.loginForm);
    if (login.form) {
        login.form.addEventListener('submit', () => {
            login.submit();
        });
    }

});
    
