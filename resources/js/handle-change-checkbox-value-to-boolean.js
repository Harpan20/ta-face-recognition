(function () {
    'use strict';
    const checkboxes = document.querySelectorAll('input[type=checkbox]');

    function handleValueCheckbox({ checkbox }) {
        const isChecked = checkbox.checked == true;
        isChecked ? (checkbox.value = 1) : (checkbox.value = 0);
    }

    checkboxes.forEach((checkbox) => {
        handleValueCheckbox({ checkbox: checkbox });
        checkbox.addEventListener('change', (e) => {
            handleValueCheckbox({ checkbox: checkbox });
        });
    });
})();
