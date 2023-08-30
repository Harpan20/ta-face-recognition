<x-layout>
    <x-slot name="head">
        <title>
            {{ __('Pengenalan Wajah') }} | {{ env('APP_NAME') }}
        </title>
    </x-slot>

    @if (session()->has('success'))
        <x-notification.success>
            {{ session()->get('success') }}
            <x-slot name="info">
                {{ __('Notification will be close in ') }}
            </x-slot>
        </x-notification.success>
    @endif

    @if (session()->has('fail'))
        <x-notification.failed>
            {{ __('Gagal mengecek data') }}
            <x-slot name="info">
                {{ __('Server sedang bermasalah') }}
            </x-slot>
        </x-notification.failed>
    @endif

    @if ($errors->any())
        <x-notification.failed>
            {{ __('Failed to save data') }}
            <x-slot name="info">
                {{ __('Capture kembali gambar wajah anda!') }}
            </x-slot>
        </x-notification.failed>
    @endif

    <!-- BEGIN: Content -->
    <div class="content">
        <div class="intro-y mt-8 flex items-center">
            <h2 class="mr-auto text-lg font-medium">
                {{ __('Pengenalan wajah') }}
            </h2>
        </div>

        <div class="mt-5 grid grid-cols-12 gap-6">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Form Layout -->
                <form
                    @if (!$faced[0]) action="{{ route('admin.face.store') }}" @endif
                    method="POST"
                >
                    @csrf
                    <div class="intro-y box p-5">
                        <div>
                            @if (!$faced[0])
                                <input
                                    class="intro-x login__input form-control hidden px-4 py-3"
                                    name="image"
                                    data-image=""
                                    type="text"
                                    placeholder="Image"
                                >
                                <video
                                    class="w-full rounded"
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
                                    class="hidden w-full rounded object-cover"
                                    data-face-image
                                    alt="face"
                                >
                            @else
                                <div
                                    class="relative flex aspect-video w-full items-center justify-center rounded bg-slate-100">
                                    <svg
                                        class="aspect-square w-full text-blue-500"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z"
                                        />
                                    </svg>
                                    <div
                                        class="absolute right-0 top-0 rounded-bl rounded-tr bg-blue-500 px-2 py-2 font-semibold text-white md:px-4 md:py-2">
                                        <div class="flex flex-row items-center justify-center gap-2">
                                            <svg
                                                class="h-6 w-6 flex-shrink-0"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"
                                                />
                                            </svg>
                                            <p class="hidden md:inline">
                                                Wajah
                                                terdaftar
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="mt-5 flex flex-row justify-end gap-2 text-right">
                            <a
                                class="btn btn-outline-secondary w-24"
                                href="{{ route('admin.dashboard') }}"
                            >
                                {{ __('Kembali') }}
                            </a>
                            @if (!$faced[0])
                                <button
                                    class="btn btn-success-soft w-24"
                                    data-face-button-capture
                                    type="button"
                                >
                                    {{ __('Capture') }}
                                </button>
                                <button
                                    class="btn btn-primary w-24"
                                    type="submit"
                                >
                                    {{ __('Save') }}
                                </button>
                            @else
                                {{-- <a
                                    class="btn btn-success-soft w-24 whitespace-nowrap"
                                    href="{{ route('admin.face.download', Auth::id()) }}"
                                    target="_blank"
                                >
                                    {{ __('Download') }}
                                </a> --}}
                                <a
                                    class="btn btn-danger w-24"
                                    data-tw-toggle="modal"
                                    data-tw-target="#delete-confirmation-modal-delete"
                                    href="javascript:;"
                                >{{ __('Delete') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
                <!-- END: Form Layout -->
            </div>
        </div>
    </div>

    @if ($faced[0])
        <div
            class="modal"
            id="delete-confirmation-modal-delete"
            aria-hidden="true"
            tabindex="-1"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form
                            action="{{ route('admin.face.destroy') }}"
                            method="POST"
                        >
                            @csrf
                            @method('delete')
                            <div class="p-5 text-center">
                                <i
                                    class="mx-auto mt-3 h-16 w-16 text-danger"
                                    data-lucide="x-circle"
                                ></i>
                                <div class="mt-5 text-3xl">
                                    {{ __('Are you sure?') }}
                                </div>
                                <div class="mt-2 text-slate-500">
                                    {{ __('Do you really want to delete these records?') }}
                                    {{-- <br>
                                This process cannot be undone. --}}
                                </div>
                            </div>
                            <div class="px-5 pb-8 text-center">
                                <button
                                    class="btn btn-outline-secondary mr-1 w-24"
                                    data-tw-dismiss="modal"
                                    type="button"
                                >
                                    {{ __('Cancel') }}
                                </button>
                                <button
                                    class="btn btn-danger w-24"
                                    type="submit"
                                >
                                    {{ __('Delete') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (!$faced[0])
        <x-slot name="script">
            <script>
                const image = document.querySelector('[data-image]'),
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
            </script>
        </x-slot>
    @endif

    <!-- END: Content -->
</x-layout>
