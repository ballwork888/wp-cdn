    document.addEventListener("DOMContentLoaded", function () {
        // ดึง element ของ menu-item-250
        let menuItemLogin = document.querySelector("#login-menu");
        let menuItemRegis = document.querySelector("#register-menu");

        // ดึง element ของ f-menu-login
        let loginButton = document.querySelector("#f-menu-login");
        let regisButton = document.querySelector("#f-menu-register");

        // ถ้ามีค่า href ของ menu-item-250 ให้นำมาแทนที่ href ของ f-menu-login
        if (menuItemLogin && loginButton) {
            loginButton.href = menuItemLogin.href;
        }
        if (menuItemRegis && regisButton) {
            regisButton.href = menuItemRegis.href;
        }
    });