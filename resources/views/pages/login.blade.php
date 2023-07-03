<!DOCTYPE html>
<html
    class="light theme-adinusa"
    lang="en"
>
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link
        href="{{ Vite::asset('resources/images/logo.svg') }}"
        rel="shortcut icon"
    >
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="description"
        content=""
    >
    <meta
        name="keywords"
        content=""
    >
    <meta
        name="author"
        content=""
    >

    <title>
        {{ __('Login') }} | {{ env('APP_NAME') }}
    </title>

    <!-- BEGIN: CSS Assets-->
    @vite('resources/css/app.css')
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    <div class="container sm:px-10">
        <div class="block grid-cols-2 gap-4 xl:grid">
            <!-- BEGIN: Login Info -->
            <div class="hidden min-h-screen flex-col xl:flex">
                <a
                    class="-intro-x flex items-center pt-5"
                    href=""
                >
                    <img
                        class="w-6"
                        src="{{ Vite::asset('resources/images/logo.svg') }}"
                        alt=""
                    >
                    <span class="ml-3 text-lg text-white">
                        {{ env('APP_NAME') }}
                    </span>
                </a>
                <div class="my-auto">
                    <img
                        class="-intro-x -mt-16 w-1/2"
                        src="{{ Vite::asset('resources/images/illustration.svg') }}"
                        alt=""
                    >
                    <div class="-intro-x mt-10 text-4xl font-medium leading-tight text-white">
                        {{ __('A few more clicks to') }}
                        <br>
                        {{ __('sign in to your account.') }}
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
                        {{ __('Manage all your contents in one place') }}
                    </div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="my-10 flex h-screen py-5 xl:my-0 xl:h-auto xl:py-0">
                <div
                    class="my-auto mx-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ml-20 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none">
                    <h2 class="intro-x text-center text-2xl font-bold xl:text-left xl:text-3xl">
                        {{ __('Sign In') }}
                    </h2>
                    <div class="intro-x mt-2 text-center text-slate-400 xl:hidden">
                        {{ __('A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place') }}
                    </div>
                    <form
                        action="{{ route('admin.proses') }}"
                        method="POST"
                    >
                        @csrf
                        <div class="intro-x mt-8">
                            <input
                                class="intro-x login__input form-control {{ session()->has('notif') ? 'border-danger' : '' }} block py-3 px-4"
                                name="username"
                                data-username=""
                                type="text"
                                placeholder="Username"
                            >
                            <div class="relative">
                                <input
                                    class="intro-x login__input form-control {{ session()->has('notif') ? 'border-danger' : '' }} mt-4 block py-3 pl-4 pr-10"
                                    name="password"
                                    data-password=""
                                    type="password"
                                    placeholder="{{ __('Password') }}"
                                >
                                <button
                                    class="absolute top-1/2 right-4 z-50 ml-auto -translate-y-1/2"
                                    data-password-trigger=""
                                    type="button"
                                >
                                    <div data-show-password>
                                        <div class="flex items-center gap-1">
                                            <div>
                                                <svg
                                                    class="h-6 w-6"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                                    />
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                    />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="hidden"
                                        data-hide-password
                                    >
                                        <div class="flex items-center gap-1">
                                            <div>
                                                <svg
                                                    class="h-6 w-6"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"
                                                    />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </div>
                            @if (session()->has('notif'))
                                <div class="login__input-error mt-2 text-danger">
                                    {{ session()->get('notif') }}
                                </div>
                            @endif
                        </div>
                        <div class="intro-x mt-5 text-center xl:mt-8 xl:text-center">
                            <p>
                                <span>
                                    Login menggunakan
                                </span>
                                <a
                                    class="font-semibold text-blue-700"
                                    href="{{ route('admin.login.face.index') }}"
                                >wajah</a>
                            </p>
                        </div>
                        <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left">
                            <button class="btn btn-primary w-full py-3 px-4 align-top">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>

    <x-dark-mode-switcher />
    <!-- BEGIN: Dark Mode Switcher-->
    {{-- <div
        class="dark-mode-switcher box dark:bg-dark-2 fixed bottom-0 right-0 z-50 mb-10 mr-10 flex h-12 w-40 cursor-pointer items-center justify-center rounded-full border shadow-md"
        data-url="login-dark-login.html"
    >
        <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
        <div class="dark-mode-switcher__toggle border"></div>
    </div> --}}
    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: JS Assets-->
    @vite('resources/js/app.js')
    <script type="text/javascript">
        const btnPasswordTrigger = document.querySelector('[data-password-trigger]');
        const username = document.querySelector('[data-username]');
        const password = document.querySelector('[data-password]');

        /**
         * * handle remove show and hide icon
         */
        function changeIconPassword({
            show,
            hide
        }) {
            show.classList.toggle('hidden');
            hide.classList.toggle('hidden');
        };

        /**
         * * show and hide passoword
         */
        btnPasswordTrigger.addEventListener('click', (e) => {
            const inputPassword = document.querySelector('input[name="password"]');
            const showPassword = document.querySelector('[data-show-password]');
            const hidePassword = document.querySelector('[data-hide-password]');

            changeIconPassword({
                show: showPassword,
                hide: hidePassword,
            });

            if (inputPassword.type === 'password') {
                inputPassword.type = 'text';
                return;
            }

            if (inputPassword.type === 'text') {
                inputPassword.type = 'password';
                return;
            }
        });

        /**
         * * handle remove error input state after validation error
         */
        function removeInputErrorState({
            element
        }) {
            if (!element.classList.contains('border-danger')) return;

            element.classList.remove('border-danger')
        }

        username.addEventListener('keyup', (e) => {
            removeInputErrorState({
                element: e.target
            })
        })

        password.addEventListener('keyup', (e) => {
            removeInputErrorState({
                element: e.target
            })
        })
    </script>
    <script type="text/javascript">
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
    <!-- END: JS Assets-->
</body>

</html>
