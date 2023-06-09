<x-layout>
    <x-slot name="head">
        <title>
            {{ __('Dashboard') }} | {{ env('APP_NAME') }}
        </title>
    </x-slot>

    <!-- BEGIN: Content -->
    <div class="content">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium">
                                General Report
                            </h2>
                            <a
                                class="ml-auto flex items-center text-primary"
                                href=""
                            > <i
                                    class="mr-3 h-4 w-4"
                                    data-lucide="refresh-ccw"
                                ></i> Reload Data </a>
                        </div>
                        <div class="mt-5 grid grid-cols-12 gap-6">
                            <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i
                                                class="report-box__icon text-primary"
                                                data-lucide="shopping-cart"
                                            ></i>
                                            <div class="ml-auto">
                                                <div
                                                    class="report-box__indicator tooltip cursor-pointer bg-success"
                                                    title="33% Higher than last month"
                                                > 33% <i
                                                        class="ml-0.5 h-4 w-4"
                                                        data-lucide="chevron-up"
                                                    ></i> </div>
                                            </div>
                                        </div>
                                        <div class="mt-6 text-3xl font-medium leading-8">4.710</div>
                                        <div class="mt-1 text-base text-slate-500">Item Sales</div>
                                    </div>
                                </div>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i
                                                class="report-box__icon text-pending"
                                                data-lucide="credit-card"
                                            ></i>
                                            <div class="ml-auto">
                                                <div
                                                    class="report-box__indicator tooltip cursor-pointer bg-danger"
                                                    title="2% Lower than last month"
                                                > 2% <i
                                                        class="ml-0.5 h-4 w-4"
                                                        data-lucide="chevron-down"
                                                    ></i> </div>
                                            </div>
                                        </div>
                                        <div class="mt-6 text-3xl font-medium leading-8">3.721</div>
                                        <div class="mt-1 text-base text-slate-500">New Orders</div>
                                    </div>
                                </div>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i
                                                class="report-box__icon text-warning"
                                                data-lucide="monitor"
                                            ></i>
                                            <div class="ml-auto">
                                                <div
                                                    class="report-box__indicator tooltip cursor-pointer bg-success"
                                                    title="12% Higher than last month"
                                                > 12% <i
                                                        class="ml-0.5 h-4 w-4"
                                                        data-lucide="chevron-up"
                                                    ></i> </div>
                                            </div>
                                        </div>
                                        <div class="mt-6 text-3xl font-medium leading-8">2.149</div>
                                        <div class="mt-1 text-base text-slate-500">Total Products</div>
                                    </div>
                                </div>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i
                                                class="report-box__icon text-success"
                                                data-lucide="user"
                                            ></i>
                                            <div class="ml-auto">
                                                <div
                                                    class="report-box__indicator tooltip cursor-pointer bg-success"
                                                    title="22% Higher than last month"
                                                > 22% <i
                                                        class="ml-0.5 h-4 w-4"
                                                        data-lucide="chevron-up"
                                                    ></i> </div>
                                            </div>
                                        </div>
                                        <div class="mt-6 text-3xl font-medium leading-8">152.040</div>
                                        <div class="mt-1 text-base text-slate-500">Unique Visitor</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: General Report -->
                    <!-- BEGIN: Sales Report -->
                    <div class="col-span-12 mt-8 lg:col-span-6">
                        <div class="intro-y block h-10 items-center sm:flex">
                            <h2 class="mr-5 truncate text-lg font-medium">
                                Sales Report
                            </h2>
                            <div class="relative mt-3 text-slate-500 sm:ml-auto sm:mt-0">
                                <i
                                    class="absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4"
                                    data-lucide="calendar"
                                ></i>
                                <input
                                    class="datepicker form-control box pl-10 sm:w-56"
                                    type="text"
                                >
                            </div>
                        </div>
                        <div class="intro-y box mt-12 p-5 sm:mt-5">
                            <div class="flex flex-col md:flex-row md:items-center">
                                <div class="flex">
                                    <div>
                                        <div class="text-lg font-medium text-primary dark:text-slate-300 xl:text-xl">
                                            $15,000</div>
                                        <div class="mt-0.5 text-slate-500">This Month</div>
                                    </div>
                                    <div
                                        class="mx-4 h-12 w-px border border-r border-dashed border-slate-200 dark:border-darkmode-300 xl:mx-5">
                                    </div>
                                    <div>
                                        <div class="text-lg font-medium text-slate-500 xl:text-xl">$10,000</div>
                                        <div class="mt-0.5 text-slate-500">Last Month</div>
                                    </div>
                                </div>
                                <div class="dropdown mt-5 md:ml-auto md:mt-0">
                                    <button
                                        class="dropdown-toggle btn btn-outline-secondary font-normal"
                                        aria-expanded="false"
                                        data-tw-toggle="dropdown"
                                    > Filter by Category <i
                                            class="ml-2 h-4 w-4"
                                            data-lucide="chevron-down"
                                        ></i> </button>
                                    <div class="dropdown-menu w-40">
                                        <ul class="dropdown-content h-32 overflow-y-auto">
                                            <li><a
                                                    class="dropdown-item"
                                                    href=""
                                                >PC & Laptop</a></li>
                                            <li><a
                                                    class="dropdown-item"
                                                    href=""
                                                >Smartphone</a></li>
                                            <li><a
                                                    class="dropdown-item"
                                                    href=""
                                                >Electronic</a></li>
                                            <li><a
                                                    class="dropdown-item"
                                                    href=""
                                                >Photography</a></li>
                                            <li><a
                                                    class="dropdown-item"
                                                    href=""
                                                >Sport</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="report-chart">
                                <div class="h-[275px]">
                                    <canvas
                                        class="mt-6 -mb-6"
                                        id="report-line-chart"
                                    ></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Sales Report -->
                    <!-- BEGIN: Weekly Top Seller -->
                    <div class="col-span-12 mt-8 sm:col-span-6 lg:col-span-3">
                        <div class="intro-y flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium">
                                Weekly Top Seller
                            </h2>
                            <a
                                class="ml-auto truncate text-primary"
                                href=""
                            >Show More</a>
                        </div>
                        <div class="intro-y box mt-5 p-5">
                            <div class="mt-3">
                                <div class="h-[213px]">
                                    <canvas id="report-pie-chart"></canvas>
                                </div>
                            </div>
                            <div class="mx-auto mt-8 w-52 sm:w-auto">
                                <div class="flex items-center">
                                    <div class="mr-3 h-2 w-2 rounded-full bg-primary"></div>
                                    <span class="truncate">17 - 30 Years old</span> <span
                                        class="ml-auto font-medium">62%</span>
                                </div>
                                <div class="mt-4 flex items-center">
                                    <div class="mr-3 h-2 w-2 rounded-full bg-pending"></div>
                                    <span class="truncate">31 - 50 Years old</span> <span
                                        class="ml-auto font-medium">33%</span>
                                </div>
                                <div class="mt-4 flex items-center">
                                    <div class="mr-3 h-2 w-2 rounded-full bg-warning"></div>
                                    <span class="truncate">>= 50 Years old</span> <span
                                        class="ml-auto font-medium">10%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Weekly Top Seller -->
                    <!-- BEGIN: Sales Report -->
                    <div class="col-span-12 mt-8 sm:col-span-6 lg:col-span-3">
                        <div class="intro-y flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium">
                                Sales Report
                            </h2>
                            <a
                                class="ml-auto truncate text-primary"
                                href=""
                            >Show More</a>
                        </div>
                        <div class="intro-y box mt-5 p-5">
                            <div class="mt-3">
                                <div class="h-[213px]">
                                    <canvas id="report-donut-chart"></canvas>
                                </div>
                            </div>
                            <div class="mx-auto mt-8 w-52 sm:w-auto">
                                <div class="flex items-center">
                                    <div class="mr-3 h-2 w-2 rounded-full bg-primary"></div>
                                    <span class="truncate">17 - 30 Years old</span> <span
                                        class="ml-auto font-medium">62%</span>
                                </div>
                                <div class="mt-4 flex items-center">
                                    <div class="mr-3 h-2 w-2 rounded-full bg-pending"></div>
                                    <span class="truncate">31 - 50 Years old</span> <span
                                        class="ml-auto font-medium">33%</span>
                                </div>
                                <div class="mt-4 flex items-center">
                                    <div class="mr-3 h-2 w-2 rounded-full bg-warning"></div>
                                    <span class="truncate">>= 50 Years old</span> <span
                                        class="ml-auto font-medium">10%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Sales Report -->
                    <!-- BEGIN: Official Store -->
                    <div class="col-span-12 mt-6 xl:col-span-8">
                        <div class="intro-y block h-10 items-center sm:flex">
                            <h2 class="mr-5 truncate text-lg font-medium">
                                Official Store
                            </h2>
                            <div class="relative mt-3 text-slate-500 sm:ml-auto sm:mt-0">
                                <i
                                    class="absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4"
                                    data-lucide="map-pin"
                                ></i>
                                <input
                                    class="form-control box pl-10 sm:w-56"
                                    type="text"
                                    placeholder="Filter by city"
                                >
                            </div>
                        </div>
                        <div class="intro-y box mt-12 p-5 sm:mt-5">
                            <div>250 Official stores in 21 countries, click the marker to see location details.
                            </div>
                            <div
                                class="report-maps mt-5 rounded-md bg-slate-200"
                                data-center="-6.2425342, 106.8626478"
                                data-sources="/dist/json/location.json"
                            ></div>
                        </div>
                    </div>
                    <!-- END: Official Store -->
                    <!-- BEGIN: Weekly Best Sellers -->
                    <div class="col-span-12 mt-6 xl:col-span-4">
                        <div class="intro-y flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium">
                                Weekly Best Sellers
                            </h2>
                        </div>
                        <div class="mt-5">
                            <div class="intro-y">
                                <div class="box zoom-in mb-3 flex items-center px-4 py-4">
                                    <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-md">
                                        <img
                                            alt="Midone - HTML Admin Template"
                                            src="dist/images/profile-5.jpg"
                                        >
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Leonardo DiCaprio</div>
                                        <div class="mt-0.5 text-xs text-slate-500">15 August 2022</div>
                                    </div>
                                    <div
                                        class="cursor-pointer rounded-full bg-success py-1 px-2 text-xs font-medium text-white">
                                        137 Sales</div>
                                </div>
                            </div>
                            <div class="intro-y">
                                <div class="box zoom-in mb-3 flex items-center px-4 py-4">
                                    <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-md">
                                        <img
                                            alt="Midone - HTML Admin Template"
                                            src="dist/images/profile-9.jpg"
                                        >
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Kate Winslet</div>
                                        <div class="mt-0.5 text-xs text-slate-500">25 August 2020</div>
                                    </div>
                                    <div
                                        class="cursor-pointer rounded-full bg-success py-1 px-2 text-xs font-medium text-white">
                                        137 Sales</div>
                                </div>
                            </div>
                            <div class="intro-y">
                                <div class="box zoom-in mb-3 flex items-center px-4 py-4">
                                    <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-md">
                                        <img
                                            alt="Midone - HTML Admin Template"
                                            src="dist/images/profile-11.jpg"
                                        >
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Hugh Jackman</div>
                                        <div class="mt-0.5 text-xs text-slate-500">10 April 2021</div>
                                    </div>
                                    <div
                                        class="cursor-pointer rounded-full bg-success py-1 px-2 text-xs font-medium text-white">
                                        137 Sales</div>
                                </div>
                            </div>
                            <div class="intro-y">
                                <div class="box zoom-in mb-3 flex items-center px-4 py-4">
                                    <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-md">
                                        <img
                                            alt="Midone - HTML Admin Template"
                                            src="dist/images/profile-8.jpg"
                                        >
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Johnny Depp</div>
                                        <div class="mt-0.5 text-xs text-slate-500">10 September 2020</div>
                                    </div>
                                    <div
                                        class="cursor-pointer rounded-full bg-success py-1 px-2 text-xs font-medium text-white">
                                        137 Sales</div>
                                </div>
                            </div>
                            <a
                                class="intro-y block w-full rounded-md border border-dotted border-slate-400 py-4 text-center text-slate-500 dark:border-darkmode-300"
                                href=""
                            >View More</a>
                        </div>
                    </div>
                    <!-- END: Weekly Best Sellers -->
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-8 grid grid-cols-12 gap-6">
                        <div class="intro-y col-span-12 sm:col-span-6 2xl:col-span-3">
                            <div class="box zoom-in p-5">
                                <div class="flex items-center">
                                    <div class="w-2/4 flex-none">
                                        <div class="truncate text-lg font-medium">Target Sales</div>
                                        <div class="mt-1 text-slate-500">300 Sales</div>
                                    </div>
                                    <div class="relative ml-auto flex-none">
                                        <div class="h-[90px] w-[90px]">
                                            <canvas id="report-donut-chart-1"></canvas>
                                        </div>
                                        <div
                                            class="absolute top-0 left-0 flex h-full w-full items-center justify-center font-medium">
                                            20%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6 2xl:col-span-3">
                            <div class="box zoom-in p-5">
                                <div class="flex">
                                    <div class="mr-3 truncate text-lg font-medium">Social Media</div>
                                    <div
                                        class="ml-auto flex cursor-pointer items-center truncate rounded-full bg-slate-100 py-1 px-2 text-xs text-slate-500 dark:bg-darkmode-400">
                                        320 Followers</div>
                                </div>
                                <div class="mt-1">
                                    <div class="h-[58px]">
                                        <canvas class="simple-line-chart-1 -ml-1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6 2xl:col-span-3">
                            <div class="box zoom-in p-5">
                                <div class="flex items-center">
                                    <div class="w-2/4 flex-none">
                                        <div class="truncate text-lg font-medium">New Products</div>
                                        <div class="mt-1 text-slate-500">1450 Products</div>
                                    </div>
                                    <div class="relative ml-auto flex-none">
                                        <div class="h-[90px] w-[90px]">
                                            <canvas id="report-donut-chart-2"></canvas>
                                        </div>
                                        <div
                                            class="absolute top-0 left-0 flex h-full w-full items-center justify-center font-medium">
                                            45%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6 2xl:col-span-3">
                            <div class="box zoom-in p-5">
                                <div class="flex">
                                    <div class="mr-3 truncate text-lg font-medium">Posted Ads</div>
                                    <div
                                        class="ml-auto flex cursor-pointer items-center truncate rounded-full bg-slate-100 py-1 px-2 text-xs text-slate-500 dark:bg-darkmode-400">
                                        180 Campaign</div>
                                </div>
                                <div class="mt-1">
                                    <div class="h-[58px]">
                                        <canvas class="simple-line-chart-1 -ml-1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: General Report -->
                    <!-- BEGIN: Weekly Top Products -->
                    <div class="col-span-12 mt-6">
                        <div class="intro-y block h-10 items-center sm:flex">
                            <h2 class="mr-5 truncate text-lg font-medium">
                                Weekly Top Products
                            </h2>
                            <div class="mt-3 flex items-center sm:ml-auto sm:mt-0">
                                <button class="btn box flex items-center text-slate-600 dark:text-slate-300"> <i
                                        class="mr-2 hidden h-4 w-4 sm:block"
                                        data-lucide="file-text"
                                    ></i> Export to Excel </button>
                                <button class="btn box ml-3 flex items-center text-slate-600 dark:text-slate-300">
                                    <i
                                        class="mr-2 hidden h-4 w-4 sm:block"
                                        data-lucide="file-text"
                                    ></i> Export to PDF </button>
                            </div>
                        </div>
                        <div class="intro-y mt-8 overflow-auto sm:mt-0 lg:overflow-visible">
                            <table class="table-report table sm:mt-2">
                                <thead>
                                    <tr>
                                        <th class="whitespace-nowrap">IMAGES</th>
                                        <th class="whitespace-nowrap">PRODUCT NAME</th>
                                        <th class="whitespace-nowrap text-center">STOCK</th>
                                        <th class="whitespace-nowrap text-center">STATUS</th>
                                        <th class="whitespace-nowrap text-center">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="image-fit zoom-in h-10 w-10">
                                                    <img
                                                        class="tooltip rounded-full"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-14.jpg"
                                                        title="Uploaded at 15 August 2022"
                                                    >
                                                </div>
                                                <div class="image-fit zoom-in -ml-5 h-10 w-10">
                                                    <img
                                                        class="tooltip rounded-full"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-10.jpg"
                                                        title="Uploaded at 1 January 2021"
                                                    >
                                                </div>
                                                <div class="image-fit zoom-in -ml-5 h-10 w-10">
                                                    <img
                                                        class="tooltip rounded-full"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-12.jpg"
                                                        title="Uploaded at 11 November 2022"
                                                    >
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                class="whitespace-nowrap font-medium"
                                                href=""
                                            >Nike Tanjun</a>
                                            <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">Sport
                                                &amp; Outdoor</div>
                                        </td>
                                        <td class="text-center">177</td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center text-danger"> <i
                                                    class="mr-2 h-4 w-4"
                                                    data-lucide="check-square"
                                                ></i> Inactive </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex items-center justify-center">
                                                <a
                                                    class="mr-3 flex items-center"
                                                    href=""
                                                > <i
                                                        class="mr-1 h-4 w-4"
                                                        data-lucide="check-square"
                                                    ></i> Edit </a>
                                                <a
                                                    class="flex items-center text-danger"
                                                    href=""
                                                > <i
                                                        class="mr-1 h-4 w-4"
                                                        data-lucide="trash-2"
                                                    ></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="image-fit zoom-in h-10 w-10">
                                                    <img
                                                        class="tooltip rounded-full"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-15.jpg"
                                                        title="Uploaded at 25 August 2020"
                                                    >
                                                </div>
                                                <div class="image-fit zoom-in -ml-5 h-10 w-10">
                                                    <img
                                                        class="tooltip rounded-full"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-12.jpg"
                                                        title="Uploaded at 14 October 2020"
                                                    >
                                                </div>
                                                <div class="image-fit zoom-in -ml-5 h-10 w-10">
                                                    <img
                                                        class="tooltip rounded-full"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-14.jpg"
                                                        title="Uploaded at 27 November 2021"
                                                    >
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                class="whitespace-nowrap font-medium"
                                                href=""
                                            >Samsung Galaxy S20 Ultra</a>
                                            <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                                Smartphone &amp; Tablet</div>
                                        </td>
                                        <td class="text-center">50</td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center text-danger"> <i
                                                    class="mr-2 h-4 w-4"
                                                    data-lucide="check-square"
                                                ></i> Inactive </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex items-center justify-center">
                                                <a
                                                    class="mr-3 flex items-center"
                                                    href=""
                                                > <i
                                                        class="mr-1 h-4 w-4"
                                                        data-lucide="check-square"
                                                    ></i> Edit </a>
                                                <a
                                                    class="flex items-center text-danger"
                                                    href=""
                                                > <i
                                                        class="mr-1 h-4 w-4"
                                                        data-lucide="trash-2"
                                                    ></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="image-fit zoom-in h-10 w-10">
                                                    <img
                                                        class="tooltip rounded-full"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-5.jpg"
                                                        title="Uploaded at 10 April 2021"
                                                    >
                                                </div>
                                                <div class="image-fit zoom-in -ml-5 h-10 w-10">
                                                    <img
                                                        class="tooltip rounded-full"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-6.jpg"
                                                        title="Uploaded at 17 May 2021"
                                                    >
                                                </div>
                                                <div class="image-fit zoom-in -ml-5 h-10 w-10">
                                                    <img
                                                        class="tooltip rounded-full"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-6.jpg"
                                                        title="Uploaded at 11 December 2022"
                                                    >
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                class="whitespace-nowrap font-medium"
                                                href=""
                                            >Nike Air Max 270</a>
                                            <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">Sport
                                                &amp; Outdoor</div>
                                        </td>
                                        <td class="text-center">188</td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center text-danger"> <i
                                                    class="mr-2 h-4 w-4"
                                                    data-lucide="check-square"
                                                ></i> Inactive </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex items-center justify-center">
                                                <a
                                                    class="mr-3 flex items-center"
                                                    href=""
                                                > <i
                                                        class="mr-1 h-4 w-4"
                                                        data-lucide="check-square"
                                                    ></i> Edit </a>
                                                <a
                                                    class="flex items-center text-danger"
                                                    href=""
                                                > <i
                                                        class="mr-1 h-4 w-4"
                                                        data-lucide="trash-2"
                                                    ></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="image-fit zoom-in h-10 w-10">
                                                    <img
                                                        class="tooltip rounded-full"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-12.jpg"
                                                        title="Uploaded at 10 September 2020"
                                                    >
                                                </div>
                                                <div class="image-fit zoom-in -ml-5 h-10 w-10">
                                                    <img
                                                        class="tooltip rounded-full"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-8.jpg"
                                                        title="Uploaded at 9 November 2022"
                                                    >
                                                </div>
                                                <div class="image-fit zoom-in -ml-5 h-10 w-10">
                                                    <img
                                                        class="tooltip rounded-full"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-14.jpg"
                                                        title="Uploaded at 3 December 2021"
                                                    >
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                class="whitespace-nowrap font-medium"
                                                href=""
                                            >Sony A7 III</a>
                                            <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                                Photography</div>
                                        </td>
                                        <td class="text-center">50</td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center text-danger"> <i
                                                    class="mr-2 h-4 w-4"
                                                    data-lucide="check-square"
                                                ></i> Inactive </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex items-center justify-center">
                                                <a
                                                    class="mr-3 flex items-center"
                                                    href=""
                                                > <i
                                                        class="mr-1 h-4 w-4"
                                                        data-lucide="check-square"
                                                    ></i> Edit </a>
                                                <a
                                                    class="flex items-center text-danger"
                                                    href=""
                                                > <i
                                                        class="mr-1 h-4 w-4"
                                                        data-lucide="trash-2"
                                                    ></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="intro-y mt-3 flex flex-wrap items-center sm:flex-row sm:flex-nowrap">
                            <nav class="w-full sm:mr-auto sm:w-auto">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a
                                            class="page-link"
                                            href="#"
                                        > <i
                                                class="h-4 w-4"
                                                data-lucide="chevrons-left"
                                            ></i> </a>
                                    </li>
                                    <li class="page-item">
                                        <a
                                            class="page-link"
                                            href="#"
                                        > <i
                                                class="h-4 w-4"
                                                data-lucide="chevron-left"
                                            ></i> </a>
                                    </li>
                                    <li class="page-item"> <a
                                            class="page-link"
                                            href="#"
                                        >...</a> </li>
                                    <li class="page-item"> <a
                                            class="page-link"
                                            href="#"
                                        >1</a> </li>
                                    <li class="page-item active"> <a
                                            class="page-link"
                                            href="#"
                                        >2</a> </li>
                                    <li class="page-item"> <a
                                            class="page-link"
                                            href="#"
                                        >3</a> </li>
                                    <li class="page-item"> <a
                                            class="page-link"
                                            href="#"
                                        >...</a> </li>
                                    <li class="page-item">
                                        <a
                                            class="page-link"
                                            href="#"
                                        > <i
                                                class="h-4 w-4"
                                                data-lucide="chevron-right"
                                            ></i> </a>
                                    </li>
                                    <li class="page-item">
                                        <a
                                            class="page-link"
                                            href="#"
                                        > <i
                                                class="h-4 w-4"
                                                data-lucide="chevrons-right"
                                            ></i> </a>
                                    </li>
                                </ul>
                            </nav>
                            <select class="box form-select mt-3 w-20 sm:mt-0">
                                <option>10</option>
                                <option>25</option>
                                <option>35</option>
                                <option>50</option>
                            </select>
                        </div>
                    </div>
                    <!-- END: Weekly Top Products -->
                </div>
            </div>
            <div class="col-span-12 2xl:col-span-3">
                <div class="-mb-10 pb-10 2xl:border-l">
                    <div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6">
                        <!-- BEGIN: Transactions -->
                        <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 2xl:col-span-12 2xl:mt-8">
                            <div class="intro-x flex h-10 items-center">
                                <h2 class="mr-5 truncate text-lg font-medium">
                                    Transactions
                                </h2>
                            </div>
                            <div class="mt-5">
                                <div class="intro-x">
                                    <div class="box zoom-in mb-3 flex items-center px-5 py-3">
                                        <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-full">
                                            <img
                                                alt="Midone - HTML Admin Template"
                                                src="dist/images/profile-5.jpg"
                                            >
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Leonardo DiCaprio</div>
                                            <div class="mt-0.5 text-xs text-slate-500">15 August 2022</div>
                                        </div>
                                        <div class="text-danger">-$44</div>
                                    </div>
                                </div>
                                <div class="intro-x">
                                    <div class="box zoom-in mb-3 flex items-center px-5 py-3">
                                        <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-full">
                                            <img
                                                alt="Midone - HTML Admin Template"
                                                src="dist/images/profile-9.jpg"
                                            >
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Kate Winslet</div>
                                            <div class="mt-0.5 text-xs text-slate-500">25 August 2020</div>
                                        </div>
                                        <div class="text-danger">-$65</div>
                                    </div>
                                </div>
                                <div class="intro-x">
                                    <div class="box zoom-in mb-3 flex items-center px-5 py-3">
                                        <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-full">
                                            <img
                                                alt="Midone - HTML Admin Template"
                                                src="dist/images/profile-11.jpg"
                                            >
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Hugh Jackman</div>
                                            <div class="mt-0.5 text-xs text-slate-500">10 April 2021</div>
                                        </div>
                                        <div class="text-danger">-$63</div>
                                    </div>
                                </div>
                                <div class="intro-x">
                                    <div class="box zoom-in mb-3 flex items-center px-5 py-3">
                                        <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-full">
                                            <img
                                                alt="Midone - HTML Admin Template"
                                                src="dist/images/profile-8.jpg"
                                            >
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Johnny Depp</div>
                                            <div class="mt-0.5 text-xs text-slate-500">10 September 2020</div>
                                        </div>
                                        <div class="text-danger">-$199</div>
                                    </div>
                                </div>
                                <div class="intro-x">
                                    <div class="box zoom-in mb-3 flex items-center px-5 py-3">
                                        <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-full">
                                            <img
                                                alt="Midone - HTML Admin Template"
                                                src="dist/images/profile-9.jpg"
                                            >
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Brad Pitt</div>
                                            <div class="mt-0.5 text-xs text-slate-500">20 August 2022</div>
                                        </div>
                                        <div class="text-success">+$42</div>
                                    </div>
                                </div>
                                <a
                                    class="intro-x block w-full rounded-md border border-dotted border-slate-400 py-3 text-center text-slate-500 dark:border-darkmode-300"
                                    href=""
                                >View More</a>
                            </div>
                        </div>
                        <!-- END: Transactions -->
                        <!-- BEGIN: Recent Activities -->
                        <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 2xl:col-span-12">
                            <div class="intro-x flex h-10 items-center">
                                <h2 class="mr-5 truncate text-lg font-medium">
                                    Recent Activities
                                </h2>
                                <a
                                    class="ml-auto truncate text-primary"
                                    href=""
                                >Show More</a>
                            </div>
                            <div
                                class="relative mt-5 before:absolute before:ml-5 before:mt-5 before:block before:h-[85%] before:w-px before:bg-slate-200 before:dark:bg-darkmode-400">
                                <div class="intro-x relative mb-3 flex items-center">
                                    <div
                                        class="before:absolute before:mt-5 before:ml-5 before:block before:h-px before:w-20 before:bg-slate-200 before:dark:bg-darkmode-400">
                                        <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-full">
                                            <img
                                                alt="Midone - HTML Admin Template"
                                                src="dist/images/profile-1.jpg"
                                            >
                                        </div>
                                    </div>
                                    <div class="box zoom-in ml-4 flex-1 px-5 py-3">
                                        <div class="flex items-center">
                                            <div class="font-medium">Christian Bale</div>
                                            <div class="ml-auto text-xs text-slate-500">07:00 PM</div>
                                        </div>
                                        <div class="mt-1 text-slate-500">Has joined the team</div>
                                    </div>
                                </div>
                                <div class="intro-x relative mb-3 flex items-center">
                                    <div
                                        class="before:absolute before:mt-5 before:ml-5 before:block before:h-px before:w-20 before:bg-slate-200 before:dark:bg-darkmode-400">
                                        <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-full">
                                            <img
                                                alt="Midone - HTML Admin Template"
                                                src="dist/images/profile-6.jpg"
                                            >
                                        </div>
                                    </div>
                                    <div class="box zoom-in ml-4 flex-1 px-5 py-3">
                                        <div class="flex items-center">
                                            <div class="font-medium">Denzel Washington</div>
                                            <div class="ml-auto text-xs text-slate-500">07:00 PM</div>
                                        </div>
                                        <div class="text-slate-500">
                                            <div class="mt-1">Added 3 new photos</div>
                                            <div class="mt-2 flex">
                                                <div
                                                    class="tooltip image-fit zoom-in mr-1 h-8 w-8"
                                                    title="Nike Tanjun"
                                                >
                                                    <img
                                                        class="rounded-md border border-white"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-14.jpg"
                                                    >
                                                </div>
                                                <div
                                                    class="tooltip image-fit zoom-in mr-1 h-8 w-8"
                                                    title="Samsung Galaxy S20 Ultra"
                                                >
                                                    <img
                                                        class="rounded-md border border-white"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-7.jpg"
                                                    >
                                                </div>
                                                <div
                                                    class="tooltip image-fit zoom-in mr-1 h-8 w-8"
                                                    title="Nike Air Max 270"
                                                >
                                                    <img
                                                        class="rounded-md border border-white"
                                                        alt="Midone - HTML Admin Template"
                                                        src="dist/images/preview-10.jpg"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="intro-x my-4 text-center text-xs text-slate-500">12 November</div>
                                <div class="intro-x relative mb-3 flex items-center">
                                    <div
                                        class="before:absolute before:mt-5 before:ml-5 before:block before:h-px before:w-20 before:bg-slate-200 before:dark:bg-darkmode-400">
                                        <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-full">
                                            <img
                                                alt="Midone - HTML Admin Template"
                                                src="dist/images/profile-2.jpg"
                                            >
                                        </div>
                                    </div>
                                    <div class="box zoom-in ml-4 flex-1 px-5 py-3">
                                        <div class="flex items-center">
                                            <div class="font-medium">Johnny Depp</div>
                                            <div class="ml-auto text-xs text-slate-500">07:00 PM</div>
                                        </div>
                                        <div class="mt-1 text-slate-500">Has changed <a
                                                class="text-primary"
                                                href=""
                                            >Dell XPS 13</a> price and description</div>
                                    </div>
                                </div>
                                <div class="intro-x relative mb-3 flex items-center">
                                    <div
                                        class="before:absolute before:mt-5 before:ml-5 before:block before:h-px before:w-20 before:bg-slate-200 before:dark:bg-darkmode-400">
                                        <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-full">
                                            <img
                                                alt="Midone - HTML Admin Template"
                                                src="dist/images/profile-3.jpg"
                                            >
                                        </div>
                                    </div>
                                    <div class="box zoom-in ml-4 flex-1 px-5 py-3">
                                        <div class="flex items-center">
                                            <div class="font-medium">Johnny Depp</div>
                                            <div class="ml-auto text-xs text-slate-500">07:00 PM</div>
                                        </div>
                                        <div class="mt-1 text-slate-500">Has changed <a
                                                class="text-primary"
                                                href=""
                                            >Samsung Q90 QLED TV</a> description</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Recent Activities -->
                        <!-- BEGIN: Important Notes -->
                        <div
                            class="col-span-12 mt-3 md:col-span-6 xl:col-span-12 xl:col-start-1 xl:row-start-1 2xl:col-start-auto 2xl:row-start-auto">
                            <div class="intro-x flex h-10 items-center">
                                <h2 class="mr-auto truncate text-lg font-medium">
                                    Important Notes
                                </h2>
                                <button
                                    class="tiny-slider-navigator btn mr-2 border-slate-300 px-2 text-slate-600 dark:text-slate-300"
                                    data-carousel="important-notes"
                                    data-target="prev"
                                > <i
                                        class="h-4 w-4"
                                        data-lucide="chevron-left"
                                    ></i> </button>
                                <button
                                    class="tiny-slider-navigator btn mr-2 border-slate-300 px-2 text-slate-600 dark:text-slate-300"
                                    data-carousel="important-notes"
                                    data-target="next"
                                > <i
                                        class="h-4 w-4"
                                        data-lucide="chevron-right"
                                    ></i> </button>
                            </div>
                            <div class="intro-x mt-5">
                                <div class="box zoom-in">
                                    <div
                                        class="tiny-slider"
                                        id="important-notes"
                                    >
                                        <div class="p-5">
                                            <div class="truncate text-base font-medium">Lorem Ipsum is simply
                                                dummy text</div>
                                            <div class="mt-1 text-slate-400">20 Hours ago</div>
                                            <div class="mt-1 text-justify text-slate-500">Lorem Ipsum is simply
                                                dummy text of the printing and typesetting industry. Lorem Ipsum has
                                                been the industry's standard dummy text ever since the 1500s.</div>
                                            <div class="mt-5 flex font-medium">
                                                <button
                                                    class="btn btn-secondary py-1 px-2"
                                                    type="button"
                                                >View Notes</button>
                                                <button
                                                    class="btn btn-outline-secondary ml-auto ml-auto py-1 px-2"
                                                    type="button"
                                                >Dismiss</button>
                                            </div>
                                        </div>
                                        <div class="p-5">
                                            <div class="truncate text-base font-medium">Lorem Ipsum is simply
                                                dummy text</div>
                                            <div class="mt-1 text-slate-400">20 Hours ago</div>
                                            <div class="mt-1 text-justify text-slate-500">Lorem Ipsum is simply
                                                dummy text of the printing and typesetting industry. Lorem Ipsum has
                                                been the industry's standard dummy text ever since the 1500s.</div>
                                            <div class="mt-5 flex font-medium">
                                                <button
                                                    class="btn btn-secondary py-1 px-2"
                                                    type="button"
                                                >View Notes</button>
                                                <button
                                                    class="btn btn-outline-secondary ml-auto ml-auto py-1 px-2"
                                                    type="button"
                                                >Dismiss</button>
                                            </div>
                                        </div>
                                        <div class="p-5">
                                            <div class="truncate text-base font-medium">Lorem Ipsum is simply
                                                dummy text</div>
                                            <div class="mt-1 text-slate-400">20 Hours ago</div>
                                            <div class="mt-1 text-justify text-slate-500">Lorem Ipsum is simply
                                                dummy text of the printing and typesetting industry. Lorem Ipsum has
                                                been the industry's standard dummy text ever since the 1500s.</div>
                                            <div class="mt-5 flex font-medium">
                                                <button
                                                    class="btn btn-secondary py-1 px-2"
                                                    type="button"
                                                >View Notes</button>
                                                <button
                                                    class="btn btn-outline-secondary ml-auto ml-auto py-1 px-2"
                                                    type="button"
                                                >Dismiss</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Important Notes -->
                        <!-- BEGIN: Schedules -->
                        <div
                            class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 xl:col-start-1 xl:row-start-2 2xl:col-span-12 2xl:col-start-auto 2xl:row-start-auto">
                            <div class="intro-x flex h-10 items-center">
                                <h2 class="mr-5 truncate text-lg font-medium">
                                    Schedules
                                </h2>
                                <a
                                    class="ml-auto flex items-center truncate text-primary"
                                    href=""
                                > <i
                                        class="mr-1 h-4 w-4"
                                        data-lucide="plus"
                                    ></i> Add New Schedules </a>
                            </div>
                            <div class="mt-5">
                                <div class="intro-x box">
                                    <div class="p-5">
                                        <div class="flex">
                                            <i
                                                class="h-5 w-5 text-slate-500"
                                                data-lucide="chevron-left"
                                            ></i>
                                            <div class="mx-auto text-base font-medium">April</div>
                                            <i
                                                class="h-5 w-5 text-slate-500"
                                                data-lucide="chevron-right"
                                            ></i>
                                        </div>
                                        <div class="mt-5 grid grid-cols-7 gap-4 text-center">
                                            <div class="font-medium">Su</div>
                                            <div class="font-medium">Mo</div>
                                            <div class="font-medium">Tu</div>
                                            <div class="font-medium">We</div>
                                            <div class="font-medium">Th</div>
                                            <div class="font-medium">Fr</div>
                                            <div class="font-medium">Sa</div>
                                            <div class="relative rounded py-0.5 text-slate-500">29</div>
                                            <div class="relative rounded py-0.5 text-slate-500">30</div>
                                            <div class="relative rounded py-0.5 text-slate-500">31</div>
                                            <div class="relative rounded py-0.5">1</div>
                                            <div class="relative rounded py-0.5">2</div>
                                            <div class="relative rounded py-0.5">3</div>
                                            <div class="relative rounded py-0.5">4</div>
                                            <div class="relative rounded py-0.5">5</div>
                                            <div class="relative rounded bg-success/20 py-0.5 dark:bg-success/30">
                                                6</div>
                                            <div class="relative rounded py-0.5">7</div>
                                            <div class="relative rounded bg-primary py-0.5 text-white">8</div>
                                            <div class="relative rounded py-0.5">9</div>
                                            <div class="relative rounded py-0.5">10</div>
                                            <div class="relative rounded py-0.5">11</div>
                                            <div class="relative rounded py-0.5">12</div>
                                            <div class="relative rounded py-0.5">13</div>
                                            <div class="relative rounded py-0.5">14</div>
                                            <div class="relative rounded py-0.5">15</div>
                                            <div class="relative rounded py-0.5">16</div>
                                            <div class="relative rounded py-0.5">17</div>
                                            <div class="relative rounded py-0.5">18</div>
                                            <div class="relative rounded py-0.5">19</div>
                                            <div class="relative rounded py-0.5">20</div>
                                            <div class="relative rounded py-0.5">21</div>
                                            <div class="relative rounded py-0.5">22</div>
                                            <div class="relative rounded bg-pending/20 py-0.5 dark:bg-pending/30">
                                                23</div>
                                            <div class="relative rounded py-0.5">24</div>
                                            <div class="relative rounded py-0.5">25</div>
                                            <div class="relative rounded py-0.5">26</div>
                                            <div class="relative rounded bg-primary/10 py-0.5 dark:bg-primary/50">
                                                27</div>
                                            <div class="relative rounded py-0.5">28</div>
                                            <div class="relative rounded py-0.5">29</div>
                                            <div class="relative rounded py-0.5">30</div>
                                            <div class="relative rounded py-0.5 text-slate-500">1</div>
                                            <div class="relative rounded py-0.5 text-slate-500">2</div>
                                            <div class="relative rounded py-0.5 text-slate-500">3</div>
                                            <div class="relative rounded py-0.5 text-slate-500">4</div>
                                            <div class="relative rounded py-0.5 text-slate-500">5</div>
                                            <div class="relative rounded py-0.5 text-slate-500">6</div>
                                            <div class="relative rounded py-0.5 text-slate-500">7</div>
                                            <div class="relative rounded py-0.5 text-slate-500">8</div>
                                            <div class="relative rounded py-0.5 text-slate-500">9</div>
                                        </div>
                                    </div>
                                    <div class="border-t border-slate-200/60 p-5">
                                        <div class="flex items-center">
                                            <div class="mr-3 h-2 w-2 rounded-full bg-pending"></div>
                                            <span class="truncate">UI/UX Workshop</span> <span
                                                class="font-medium xl:ml-auto"
                                            >23th</span>
                                        </div>
                                        <div class="mt-4 flex items-center">
                                            <div class="mr-3 h-2 w-2 rounded-full bg-primary"></div>
                                            <span class="truncate">VueJs Frontend Development</span> <span
                                                class="font-medium xl:ml-auto"
                                            >10th</span>
                                        </div>
                                        <div class="mt-4 flex items-center">
                                            <div class="mr-3 h-2 w-2 rounded-full bg-warning"></div>
                                            <span class="truncate">Laravel Rest API</span> <span
                                                class="font-medium xl:ml-auto"
                                            >31th</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Schedules -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->
</x-layout>
