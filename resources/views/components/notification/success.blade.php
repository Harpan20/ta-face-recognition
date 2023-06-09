<!-- BEGIN: Notification success trigger -->
<div data-toggle-notif-succes></div>
<!-- END: Notification success trigger -->

<!-- BEGIN: Notification success -->
<div class="toastify-content flex hidden" id="success-notification-content">
    <i class="text-success" data-lucide="check-circle"></i>
    <div class="ml-4 mr-4">
        <div class="font-medium">{{ $slot ?? '' }}</div>
        <div class="mt-1 text-slate-500">
            {{ $info ?? '' }} <span data-close-countdown></span>
        </div>
    </div>
</div>
<!-- END: Notification success -->
