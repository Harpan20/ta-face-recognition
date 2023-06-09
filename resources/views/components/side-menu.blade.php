<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <ul>
        <li>
            <a
                class="side-menu {{ Request::routeIs('admin.dashboard') ? 'side-menu--active' : '' }}"
                href="{{ route('admin.dashboard') }}"
            >
                <div class="side-menu__icon">
                    <i data-lucide="home"></i>
                </div>
                <div class="side-menu__title">{{ __('Dashboard') }}</div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a
                class="side-menu {{ Request::routeIs(
                    'visions.*',
                    'missions.*',
                    'emails.*',
                    'phone-numbers.*',
                    'whatsapps.*',
                    'addresses.*',
                    'excellences.*',
                    'company-values.*',
                )
                    ? 'side-menu--active'
                    : '' }}"
                href="javascript:;"
            >
                <div class="side-menu__icon">
                    <i data-lucide="trello"></i>
                </div>
                <div class="side-menu__title">
                    {{ __('Profile') }}
                    <div class="side-menu__sub-icon">
                        <i data-lucide="chevron-down"></i>
                    </div>
                </div>
            </a>
            <ul
                class="{{ Request::routeIs(
                    'visions.*',
                    'missions.*',
                    'emails.*',
                    'phone-numbers.*',
                    'whatsapps.*',
                    'addresses.*',
                    'excellences.*',
                    'company-values.*',
                )
                    ? 'side-menu__sub-open'
                    : '' }}">
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('visions.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('visions.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Visions') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('missions.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('missions.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Missions') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('emails.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('emails.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Emails') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('phone-numbers.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('phone-numbers.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Phone Numbers') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('whatsapps.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('whatsapps.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Whatsapps') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('addresses.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('addresses.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Addresses') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('excellences.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('excellences.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Excellences') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('company-values.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('company-values.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Company Values') }}
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a
                class="side-menu {{ Request::routeIs('countries.index') ? 'side-menu--active' : '' }}"
                href="{{ route('countries.index') }}"
            >
                <div class="side-menu__icon">
                    <i data-lucide="globe"></i>
                </div>
                <div class="side-menu__title">{{ __('Countries') }}</div>
            </a>
        </li>
        <li>
            <a
                class="side-menu {{ Request::routeIs('teams.*', 'positions.*') ? 'side-menu--active' : '' }}"
                href="javascript:;"
            >
                <div class="side-menu__icon">
                    <i data-lucide="users"></i>
                </div>
                <div class="side-menu__title">
                    {{ __('Core') }}
                    <div class="side-menu__sub-icon">
                        <i data-lucide="chevron-down"></i>
                    </div>
                </div>
            </a>
            <ul class="{{ Request::routeIs('teams.*', 'positions.*') ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('teams.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('teams.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Teams') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('positions.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('positions.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Positions') }}
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a
                class="side-menu {{ Request::routeIs('contact-forms.*') ? 'side-menu--active' : '' }}"
                href="{{ route('contact-forms.index') }}"
            >
                <div class="side-menu__icon">
                    <i data-lucide="mail"></i>
                </div>
                <div class="side-menu__title">{{ __('Contact Forms') }}</div>
            </a>
        </li>
        <li>
            <a
                class="side-menu {{ Request::routeIs('clients.*') ? 'side-menu--active' : '' }}"
                href="{{ route('clients.index') }}"
            >
                <div class="side-menu__icon">
                    <i data-lucide="star"></i>
                </div>
                <div class="side-menu__title">{{ __('Clients') }}</div>
            </a>
        </li>
        <li>
            <a
                class="side-menu {{ Request::routeIs('testimonies.*') ? 'side-menu--active' : '' }}"
                href="{{ route('testimonies.index') }}"
            >
                <div class="side-menu__icon">
                    <i data-lucide="message-square"></i>
                </div>
                <div class="side-menu__title">{{ __('Testimonies') }}</div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a
                class="side-menu {{ Request::routeIs('posts.*', 'categories.*', 'post-types.*', 'tags.*') ? 'side-menu--active' : '' }}"
                href="javascript:;"
            >
                <div class="side-menu__icon">
                    <i data-lucide="file-text"></i>
                </div>
                <div class="side-menu__title">
                    {{ __('Blogs') }}
                    <div class="side-menu__sub-icon">
                        <i data-lucide="chevron-down"></i>
                    </div>
                </div>
            </a>
            <ul
                class="{{ Request::routeIs('posts.*', 'categories.*', 'post-types.*', 'tags.*') ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('posts.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('posts.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Posts') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('categories.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('categories.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Categories') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('post-types.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('post-types.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Post Types') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('tags.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('tags.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Tags') }}
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a
                class="side-menu {{ Request::routeIs(
                    'products.*',
                    'features.*',
                    'benefits.*',
                    'advantages.*',
                    'supports.*',
                    'faqs.*',
                    'faqs.*',
                    'faqs.*',
                    'faqs.*',
                )
                    ? 'side-menu--active'
                    : '' }}"
                href="javascript:;"
            >
                <div class="side-menu__icon">
                    <i data-lucide="box"></i>
                </div>
                <div class="side-menu__title">
                    {{ __('Products') }}
                    <div class="side-menu__sub-icon">
                        <i data-lucide="chevron-down"></i>
                    </div>
                </div>
            </a>
            <ul
                class="{{ Request::routeIs(
                    'products.*',
                    'features.*',
                    'benefits.*',
                    'advantages.*',
                    'supports.*',
                    'faqs.*',
                    'faqs.*',
                    'faqs.*',
                    'faqs.*',
                )
                    ? 'side-menu__sub-open'
                    : '' }}">
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('products.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('products.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Products') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('features.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('features.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Features') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('benefits.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('benefits.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Benefits') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('advantages.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('advantages.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Advantages') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('supports.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('supports.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Supports') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('faqs.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('faqs.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('FAQs') }}
                        </div>
                    </a>
                </li>
                {{-- <li>
                    <a
                        class="side-menu {{ Request::routeIs('tags.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('tags.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Demo Requests') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('tags.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('tags.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Promos') }}
                        </div>
                    </a>
                </li>
                <li>
                    <a
                        class="side-menu {{ Request::routeIs('tags.*') ? 'side-menu--active' : '' }}"
                        href="{{ route('tags.index') }}"
                    >
                        <div class="side-menu__icon">
                            <i data-lucide="activity"></i>
                        </div>
                        <div class="side-menu__title">
                            {{ __('Promo Claims') }}
                        </div>
                    </a>
                </li> --}}
            </ul>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a
                class="side-menu {{ Request::routeIs('promos.*') ? 'side-menu--active' : '' }}"
                href="{{ route('promos.index') }}"
            >
                <div class="side-menu__icon">
                    <i data-lucide="dollar-sign"></i>
                </div>
                <div class="side-menu__title">{{ __('Promos') }}</div>
            </a>
        </li>
        <li>
            <a
                class="side-menu {{ Request::routeIs('promo-claims.*') ? 'side-menu--active' : '' }}"
                href="{{ route('promo-claims.index') }}"
            >
                <div class="side-menu__icon">
                    <i data-lucide="crosshair"></i>
                </div>
                <div class="side-menu__title">{{ __('Promo Claims') }}</div>
            </a>
        </li>
        <li>
            <a
                class="side-menu {{ Request::routeIs('demos.*') ? 'side-menu--active' : '' }}"
                href="{{ route('demos.index') }}"
            >
                <div class="side-menu__icon">
                    <i data-lucide="aperture"></i>
                </div>
                <div class="side-menu__title">{{ __('Demos') }}</div>
            </a>
        </li>
    </ul>
</nav>
<!-- END: Side Menu -->
