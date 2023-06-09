<!-- BEGIN: Notification success trigger -->
<div data-toggle-notif-failed></div>
<!-- END: Notification success trigger -->

<!-- BEGIN: Failed Notification Content -->
<div class="toastify-content flex hidden" id="failed-notification-content">
    <i class="text-danger" data-lucide="x-circle"></i>
    <div class="ml-4 mr-4">
        <div class="font-medium">{{ $slot ?? '' }}</div>
        <div class="mt-1 text-slate-500">
            {{ $info ?? '' }}
        </div>
    </div>
</div>
<!-- END: Failed Notification Content -->
