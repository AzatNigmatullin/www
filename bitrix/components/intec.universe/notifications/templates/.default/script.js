document.addEventListener('DOMContentLoaded', function () {
    const notification = document.querySelector('.notification');
    const agreeButton = document.querySelector('.notification-button-wrapper .widget-agree');

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    if (!getCookie('cookies_policy')) {
        setTimeout(() => {
            if (notification)
                notification.style.display = 'flex';
        }, 1000);
    } else {
        if (notification)
            notification.style.display = 'none';
    }

    if (agreeButton) {
        agreeButton.addEventListener('click', function () {
            setCookie('cookies_policy', 'true', 365);
            if (notification)
                notification.style.display = 'none';
        });
    }
});

