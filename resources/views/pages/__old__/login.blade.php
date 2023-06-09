<!doctype html>
<html lang="en">

<head>
    <title>Admin {{ env('APP_NAME') }} | Login</title>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon"
        type="image/png"
        href="{{ asset('assets/images/favicon-32.png') }}"
        sizes="32x32">
    <link rel="icon"
        type="image/png"
        href="{{ asset('assets/images/favicon-48.png') }}"
        sizes="48x48">
    <link rel="icon"
        type="image/png"
        href="{{ asset('assets/images/favicon-96.png') }}"
        sizes="96x96">
    <link rel="icon"
        type="image/png"
        href="{{ asset('assets/images/favicon-144.png') }}"
        sizes="144x144">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets/login/css/style.css') }}">
    {{-- vite --}}
    @vite('resources/js/app.js')
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login Admin {{ env('APP_NAME') }}</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        {{-- <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div> --}}
                        <div class="row">
                            <div class="col d-flex justify-content-center align-items-center">
                                <img class="img-fluid"
                                    src="{{ asset('assets/images/lkm-center.png') }}"
                                    alt="LKM Pandeglang"
                                    style="max-width: 65%;">
                            </div>
                        </div>

                        <h3 class="text-center mb-4">Sign In</h3>
                        <form action="{{ route('admin.proses') }}"
                            class="login-form"
                            method="POST">
                            @csrf
                            @if (session()->has('notif'))
                                <div class="alert alert-danger alert-dismissible fade show"
                                    role="alert">
                                    <strong>{{ session()->get('notif') }}</strong>
                                    <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="text"
                                    class="form-control rounded-left"
                                    name="username"
                                    placeholder="Username"
                                    required>
                            </div>
                            <div class="form-group">
                                <div class="tw-relative">
                                    <input type="password"
                                        class="form-control rounded-left"
                                        name="password"
                                        placeholder="Password"
                                        required>
                                    <button
                                        class="tw-absolute tw-right-2 tw-w-6 tw-h-6 tw-top-1/2 -tw-translate-y-1/2 focus:tw-outline-none"
                                        type="button"
                                        data-password-trigger>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-6 h-6"
                                            data-icon-show-password>
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-6 h-6 tw-hidden"
                                            data-icon-hide-password>
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                        </svg>


                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary rounded submit px-3">Login</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox"
                                            checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        const btnPasswordTrigger = document.querySelector('[data-password-trigger]');

        function changeIconPassword({
            show,
            hide
        }) {
            show.classList.toggle('tw-hidden');
            hide.classList.toggle('tw-hidden');
        };

        function btnPasswordHandler() {
            const inputPassword = document.querySelector('input[name="password"]');
            const showIcon = document.querySelector('[data-icon-show-password]');
            const hideIcon = document.querySelector('[data-icon-hide-password]');

            changeIconPassword({
                show: showIcon,
                hide: hideIcon,
            });

            if (inputPassword.type === 'password') {
                inputPassword.type = 'text';
                return;
            }

            if (inputPassword.type === 'text') {
                inputPassword.type = 'password';
                return;
            }
        }

        btnPasswordTrigger.addEventListener('click', btnPasswordHandler);
    </script>

</body>

</html>
