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
                        action="{{ route('admin.login.face.check') }}"
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
                            <input
                                class="intro-x login__input form-control block py-3 px-4 hidden"
                                name="image"
                                data-image=""
                                type="text"
                                placeholder="Image"
                            >
                            @if (session()->has('notif'))
                                <div class="login__input-error mt-2 text-danger">
                                    {{ session()->get('notif') }}
                                </div>
                            @endif
                        </div>
                        <div class="intro-x mt-8 flex flex-col gap-4">
                            <video
                                class="rounded"
                                data-face-video
                                autoplay
                                muted
                                width="352"
                            ></video>
                            <canvas
                                class="hidden rounded"
                                data-face-canvas
                            ></canvas>
                            <img
                                class="hidden"
                                data-face-image
                                alt="face"
                            >
                        </div>
                        <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left">
                            <button
                                class="btn btn-primary w-full py-3 px-4 align-top"
                                data-face-button-capture
                                type="button"
                            >
                                {{ __('Capture') }}
                            </button>
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
    <div
        class="dark-mode-switcher box dark:bg-dark-2 fixed bottom-0 right-0 z-50 mb-10 mr-10 flex h-12 w-40 cursor-pointer items-center justify-center rounded-full border shadow-md"
        data-url="login-dark-login.html"
    >
        <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
        <div class="dark-mode-switcher__toggle border"></div>
    </div>
    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: JS Assets-->
    @vite('resources/js/app.js')
    <script>
        const username = document.querySelector('[data-username]'),
            image = document.querySelector('[data-image]'),
            faceVideo = document.querySelector('[data-face-video]'),
            faceCanvas = document.querySelector('[data-face-canvas]'),
            faceImage = document.querySelector('[data-face-image]'),
            faceButtonCapture = document.querySelector('[data-face-button-capture]');

        navigator.mediaDevices.getUserMedia({
                audio: false,
                video: {}
            })
            .then(stream => {
                faceVideo.srcObject = stream;
                faceVideo.play();
            })
            .catch(error => console.error(error))

        faceButtonCapture.addEventListener('click', function() {
            const context = faceCanvas.getContext('2d');
            faceCanvas.height = 264;
            faceCanvas.width = 352;
            context.drawImage(faceVideo, 0, 0, faceCanvas.width, faceCanvas.height);
            if (faceImage.classList.contains('hidden')) {
                faceVideo.classList.toggle('hidden');
                faceImage.classList.toggle('hidden');
                faceButtonCapture.textContent = 'Recapture';
                console.log(faceCanvas.toDataURL());
                faceImage.src = faceCanvas.toDataURL();
                image.value = faceCanvas.toDataURL();
            } else {
                faceVideo.classList.toggle('hidden');
                faceImage.classList.toggle('hidden');
                faceButtonCapture.textContent = 'Capture';
                image.value = "";
            }

            // data url of the image
        });

        // * handle remove error input state after validation error
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
    </script>
    <!-- END: JS Assets-->
</body>

</html>
