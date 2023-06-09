@props(['head', 'script'])

<!DOCTYPE html>

<html class="light theme-adinusa" lang="en">

<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ Vite::asset('resources/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    {{ $head ?? '' }}

    <!-- BEGIN: CSS Assets-->
    @vite('resources/css/app.css')
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5 md:py-0">
    <x-mobile-menu />
    <x-top-bar />

    <div class="flex overflow-hidden">
        <x-side-menu />
        {{ $slot ?? '' }}
        <x-dark-mode-switcher />
    </div>


    <!-- BEGIN: JS Assets-->
    <!-- handle dark mode-->
    <script>
        const toggleDarkMode = document.querySelector("[data-toggle-dark-mode-button]");
        const baseTheme = document.documentElement;
        const darkModeIndicator = document.querySelector("[data-dark-mode-indicator]")
        let darkMode;

        if (localStorage.getItem("dark-mode") === null) {
            localStorage.setItem("dark-mode", "disabled");
        }
        darkMode = localStorage.getItem("dark-mode");

        const enableDarkMode = () => {
            if (baseTheme.classList.contains("light")) {
                baseTheme.classList.remove("light");
            }
            baseTheme.classList.add("dark");
            darkModeIndicator.classList.add("dark-mode-switcher__toggle--active");
            localStorage.setItem("dark-mode", "enabled");
        };

        const disableDarkMode = () => {
            if (baseTheme.classList.contains("dark")) {
                baseTheme.classList.remove("dark");
            }
            if (darkModeIndicator.classList.contains("dark-mode-switcher__toggle--active")) {
                darkModeIndicator.classList.remove("dark-mode-switcher__toggle--active");
            }
            baseTheme.classList.add("light");
            localStorage.setItem("dark-mode", "disabled");
        };

        if (darkMode === "enabled") {
            enableDarkMode(); // set state of darkMode on page load
        }

        toggleDarkMode.addEventListener("click", (e) => {
            darkMode = localStorage.getItem("dark-mode"); // update darkMode when clicked
            if (darkMode === "disabled") {
                enableDarkMode();
            } else {
                disableDarkMode();
            }
        });
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[your-google-map-api]&libraries=places"></script>
    @vite('resources/js/app.js')
    {{ $script ?? '' }}
    <!-- END: JS Assets-->
</body>

</html>
