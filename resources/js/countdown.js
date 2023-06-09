(function () {
    'use strict';

    const closeCountdownText = document.querySelector('[data-close-countdown]');
    let countdownTime = 3;

    if (closeCountdownText) {
        closeCountdownText.innerHTML = 4;

        const downloadTimer = setInterval(function () {
            if (countdownTime <= 0) {
                clearInterval(downloadTimer);
            }
            closeCountdownText.innerHTML = countdownTime;
            countdownTime -= 1;
        }, 1000);
    }
})();
