<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a class="mr-auto flex" href="">
            <img class="w-6" alt="Midone - HTML Admin Template" src="{{ Vite::asset('resources/images/logo.svg') }}">
        </a>
        <a class="mobile-menu-toggler" href="javascript:;">
            <i class="h-8 w-8 -rotate-90 transform text-white" data-lucide="bar-chart-2"></i>
        </a>
    </div>
    <div class="scrollable">
        <a class="mobile-menu-toggler" href="javascript:;">
            <i class="h-8 w-8 -rotate-90 transform text-white" data-lucide="x-circle"></i>
        </a>
        <ul class="scrollable__content py-2">
            <li>
                <a class="menu {{ Request::routeIs('admin.dashboard') ? 'menu--active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <div class="menu__icon">
                        <i data-lucide="home"></i>
                    </div>
                    <div class="menu__title">{{ __('Dashboard') }}</div>
                </a>
            </li>
            <li>
                <a class="menu menu--active" href="javascript:;.html">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title"> Dashboard <i class="menu__sub-icon rotate-180 transform"
                            data-lucide="chevron-down"></i> </div>
                </a>
                <ul class="menu__sub-open">
                    <li>
                        <a class="menu menu--active" href="side-menu-light-dashboard-overview-1.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Overview 1 </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-dashboard-overview-2.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Overview 2 </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-dashboard-overview-3.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Overview 3 </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="index.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Overview 4 </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="menu" href="javascript:;">
                    <div class="menu__icon"> <i data-lucide="box"></i> </div>
                    <div class="menu__title"> Menu Layout <i class="menu__sub-icon" data-lucide="chevron-down"></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a class="menu menu--active" href="side-menu-light-dashboard-overview-1.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Side Menu </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu menu--active" href="simple-menu-light-dashboard-overview-1.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Simple Menu </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu menu--active" href="top-menu-light-dashboard-overview-1.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Top Menu </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="menu" href="javascript:;">
                    <div class="menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                    <div class="menu__title"> E-Commerce <i class="menu__sub-icon" data-lucide="chevron-down"></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a class="menu" href="side-menu-light-categories.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Categories </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-add-product.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Add Product </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="javascript:;">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Products <i class="menu__sub-icon" data-lucide="chevron-down"></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a class="menu" href="side-menu-light-product-list.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Product List</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-product-grid.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Product Grid</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="menu" href="javascript:;">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Transactions <i class="menu__sub-icon"
                                    data-lucide="chevron-down"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a class="menu" href="side-menu-light-transaction-list.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Transaction List</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-transaction-detail.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Transaction Detail</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="menu" href="javascript:;">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Sellers <i class="menu__sub-icon"
                                    data-lucide="chevron-down"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a class="menu" href="side-menu-light-seller-list.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Seller List</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-seller-detail.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Seller Detail</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-reviews.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Reviews </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="menu" href="side-menu-light-inbox.html">
                    <div class="menu__icon"> <i data-lucide="inbox"></i> </div>
                    <div class="menu__title"> Inbox </div>
                </a>
            </li>
            <li>
                <a class="menu" href="side-menu-light-file-manager.html">
                    <div class="menu__icon"> <i data-lucide="hard-drive"></i> </div>
                    <div class="menu__title"> File Manager </div>
                </a>
            </li>
            <li>
                <a class="menu" href="side-menu-light-point-of-sale.html">
                    <div class="menu__icon"> <i data-lucide="credit-card"></i> </div>
                    <div class="menu__title"> Point of Sale </div>
                </a>
            </li>
            <li>
                <a class="menu" href="side-menu-light-chat.html">
                    <div class="menu__icon"> <i data-lucide="message-square"></i> </div>
                    <div class="menu__title"> Chat </div>
                </a>
            </li>
            <li>
                <a class="menu" href="side-menu-light-post.html">
                    <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                    <div class="menu__title"> Post </div>
                </a>
            </li>
            <li>
                <a class="menu" href="side-menu-light-calendar.html">
                    <div class="menu__icon"> <i data-lucide="calendar"></i> </div>
                    <div class="menu__title"> Calendar </div>
                </a>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a class="menu" href="javascript:;">
                    <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                    <div class="menu__title"> Crud <i class="menu__sub-icon" data-lucide="chevron-down"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a class="menu" href="side-menu-light-crud-data-list.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Data List </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-crud-form.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Form </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="menu" href="javascript:;">
                    <div class="menu__icon"> <i data-lucide="users"></i> </div>
                    <div class="menu__title"> Users <i class="menu__sub-icon" data-lucide="chevron-down"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a class="menu" href="side-menu-light-users-layout-1.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Layout 1 </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-users-layout-2.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Layout 2 </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-users-layout-3.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Layout 3 </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="menu" href="javascript:;">
                    <div class="menu__icon"> <i data-lucide="trello"></i> </div>
                    <div class="menu__title"> Profile <i class="menu__sub-icon" data-lucide="chevron-down"></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a class="menu" href="side-menu-light-profile-overview-1.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Overview 1 </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-profile-overview-2.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Overview 2 </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-profile-overview-3.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Overview 3 </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="menu" href="javascript:;">
                    <div class="menu__icon"> <i data-lucide="layout"></i> </div>
                    <div class="menu__title"> Pages <i class="menu__sub-icon" data-lucide="chevron-down"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a class="menu" href="javascript:;">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Wizards <i class="menu__sub-icon"
                                    data-lucide="chevron-down"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a class="menu" href="side-menu-light-wizard-layout-1.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-wizard-layout-2.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-wizard-layout-3.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Layout 3</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="menu" href="javascript:;">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Blog <i class="menu__sub-icon" data-lucide="chevron-down"></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a class="menu" href="side-menu-light-blog-layout-1.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-blog-layout-2.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-blog-layout-3.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Layout 3</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="menu" href="javascript:;">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Pricing <i class="menu__sub-icon"
                                    data-lucide="chevron-down"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a class="menu" href="side-menu-light-pricing-layout-1.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-pricing-layout-2.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="menu" href="javascript:;">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Invoice <i class="menu__sub-icon"
                                    data-lucide="chevron-down"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a class="menu" href="side-menu-light-invoice-layout-1.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-invoice-layout-2.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="menu" href="javascript:;">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> FAQ <i class="menu__sub-icon" data-lucide="chevron-down"></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a class="menu" href="side-menu-light-faq-layout-1.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-faq-layout-2.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-faq-layout-3.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Layout 3</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="menu" href="login-light-login.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Login </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="login-light-register.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Register </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="main-light-error-page.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Error Page </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-update-profile.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Update profile </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-change-password.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Change Password </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a class="menu" href="javascript:;">
                    <div class="menu__icon"> <i data-lucide="inbox"></i> </div>
                    <div class="menu__title"> Components <i class="menu__sub-icon" data-lucide="chevron-down"></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a class="menu" href="javascript:;">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Table <i class="menu__sub-icon" data-lucide="chevron-down"></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a class="menu" href="side-menu-light-regular-table.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Regular Table</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-tabulator.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Tabulator</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="menu" href="javascript:;">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Overlay <i class="menu__sub-icon"
                                    data-lucide="chevron-down"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a class="menu" href="side-menu-light-modal.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Modal</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-slide-over.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Slide Over</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-notification.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Notification</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-Tab.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Tab </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-accordion.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Accordion </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-button.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Button </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-alert.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Alert </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-progress-bar.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Progress Bar </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-tooltip.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Tooltip </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-dropdown.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Dropdown </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-typography.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Typography </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-icon.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Icon </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-loading-icon.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Loading Icon </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="menu" href="javascript:;">
                    <div class="menu__icon"> <i data-lucide="sidebar"></i> </div>
                    <div class="menu__title"> Forms <i class="menu__sub-icon" data-lucide="chevron-down"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a class="menu" href="side-menu-light-regular-form.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Regular Form </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-datepicker.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Datepicker </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-tom-select.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Tom Select </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-file-upload.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> File Upload </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="javascript:;">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Wysiwyg Editor <i class="menu__sub-icon"
                                    data-lucide="chevron-down"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a class="menu" href="side-menu-light-wysiwyg-editor-classic.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Classic</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-wysiwyg-editor-inline.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Inline</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-wysiwyg-editor-balloon.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Balloon</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-wysiwyg-editor-balloon-block.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Balloon Block</div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="side-menu-light-wysiwyg-editor-document.html">
                                    <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                    <div class="menu__title">Document</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-validation.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Validation </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="menu" href="javascript:;">
                    <div class="menu__icon"> <i data-lucide="hard-drive"></i> </div>
                    <div class="menu__title"> Widgets <i class="menu__sub-icon" data-lucide="chevron-down"></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a class="menu" href="side-menu-light-chart.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Chart </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-slider.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Slider </div>
                        </a>
                    </li>
                    <li>
                        <a class="menu" href="side-menu-light-image-zoom.html">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Image Zoom </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Mobile Menu -->
