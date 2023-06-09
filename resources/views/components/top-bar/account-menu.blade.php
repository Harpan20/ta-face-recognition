<!-- BEGIN: Account Menu -->
<div class="intro-x dropdown h-8 w-8">
    <div class="dropdown-toggle image-fit zoom-in h-8 w-8 scale-110 overflow-hidden rounded-full shadow-lg" role="button"
        aria-expanded="false" data-tw-toggle="dropdown">
        <img alt="" src="{{ Vite::asset('resources/images/profile-6.jpg') }}">
    </div>
    <div class="dropdown-menu w-56">
        <ul
            class="dropdown-content bg-primary/80 text-white before:absolute before:inset-0 before:z-[-1] before:block before:rounded-md before:bg-black">
            <li class="p-2">
                <div class="font-medium">Al Pacino</div>
                <div class="mt-0.5 text-xs text-white/60 dark:text-slate-500">DevOps Engineer</div>
            </li>
            <li>
                <hr class="dropdown-divider border-white/[0.08]">
            </li>
            <li>
                <a class="dropdown-item hover:bg-white/5" href="">
                    <i class="mr-2 h-4 w-4" data-lucide="user"></i> Profile
                </a>
            </li>
            <li>
                <a class="dropdown-item hover:bg-white/5" href="">
                    <i class="mr-2 h-4 w-4" data-lucide="edit"></i> Add Account
                </a>
            </li>
            <li>
                <a class="dropdown-item hover:bg-white/5" href="">
                    <i class="mr-2 h-4 w-4" data-lucide="lock"></i> Reset Password
                </a>
            </li>
            <li>
                <a class="dropdown-item hover:bg-white/5" href="">
                    <i class="mr-2 h-4 w-4" data-lucide="help-circle"></i> Help
                </a>
            </li>
            <li>
                <hr class="dropdown-divider border-white/[0.08]">
            </li>
            <li>
                <form action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button class="dropdown-item w-full hover:bg-white/5" type="submit">
                        <i class="mr-2 h-4 w-4" data-lucide="toggle-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
<!-- END: Account Menu -->
