<!-- HEADER -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="<?= base_url('css/app.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/dataTable.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/remixicon.css'); ?>">

    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400,401,500,501,700,701,900,901,1,2&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/ju/jq-3.7.0/jszip-3.10.1/dt-2.0.7/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.2/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.2/sb-1.7.1/sp-2.3.1/sl-2.0.1/sr-1.4.1/datatables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/ju/jq-3.7.0/jszip-3.10.1/dt-2.0.7/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.2/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.2/sb-1.7.1/sp-2.3.1/sl-2.0.1/sr-1.4.1/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
</head>

<body class="bg-gray-300 overflow-hidden ">
    <div class="flex space-x-2 py-2 h-screen">
        <!-- SIDEBAR -->
        <div id="sidebar" class="flex-none transition-all duration-300" style="width: 256px;">
            <div class="flex h-full flex-grow flex-col overflow-y-auto rounded-br-lg rounded-tr-lg bg-white pt-5 shadow-rose-600">
                <div class="p-4 flex justify-center items-center space-x-2">
                    <img src="<?= base_url('assets/img/CILogo.png'); ?>" alt="logo" class="w-8 h-8" />
                    <h1 class="sidebarHidden text-[#d24124] text-xl  transition-all duration-300">
                        Code<span class="font-bold">Igniter</span>
                    </h1>
                </div>
                <span class="sidebarCenter flex ml-4 mt-10 mb-2 text-xxs font-semibold text-[#757575] uppercase">Main</span>
                <div class="flex mt-3 flex-1 flex-col">
                    <nav>
                        <a href="<?= route_to('/'); ?>" title="" class="sidebarCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                            <i class="ri-dashboard-horizontal-line mr-4 align-middle text-xl"></i>
                            <span class="sidebarHidden">Dashboard</span>
                        </a>
                        <div class="relative transition">
                            <input class="peer hidden" placeholder="." type="checkbox" id="menu-1" />
                            <button class="sidebarCenter flex peer relative w-full items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:text-rose-600 focus:border-l-4">
                                <i class="ri-line-chart-line mr-4 align-middle text-xl"></i>
                                <span class="sidebarHidden">Data</span>
                                <label for="menu-1" class="absolute inset-0 h-full w-full cursor-pointer"></label>
                            </button>
                            <i class="sidebarHidden ri-arrow-up-s-line absolute right-0 top-2.5 ml-auto mr-5 text-gray-600 transition peer-checked:rotate-180 peer-hover:text-rose-600"></i>
                            <ul class="duration-400 flex max-h-0 flex-col mx-2 overflow-hidden rounded-xl bg-gray-100 font-medium transition-all duration-300 peer-checked:max-h-96">
                                <a href="<?= route_to('dataalternative'); ?>" class="sidebarCenter flex items-center mx-2 cursor-pointer border-l-rose-600 py-2 pl-5 text-sm text-gray-600 transition-all duration-100 ease-in-out hover:border-l-4 hover:text-rose-600">
                                    <span class="mr-5">
                                        <i class="ri-checkbox-blank-circle-line text-xl"></i>
                                    </span>
                                    <span class="sidebarHidden">Alternative</span>
                                </a>
                                <a href="<?= route_to('datacriteria'); ?>" class="sidebarCenter flex items-center mx-2 cursor-pointer border-l-rose-600 py-2 pl-5 text-sm text-gray-600 transition-all duration-100 ease-in-out hover:border-l-4 hover:text-rose-600">
                                    <span class="mr-5">
                                        <i class="ri-checkbox-blank-circle-line text-xl"></i>
                                    </span>
                                    <span class="sidebarHidden">Criteria</span>
                                </a>
                                <a href="<?= route_to('dataassessment'); ?>" class="sidebarCenter flex items-center mx-2 cursor-pointer border-l-rose-600 py-2 pl-5 text-sm text-gray-600 transition-all duration-100 ease-in-out hover:border-l-4 hover:text-rose-600">
                                    <span class="mr-5">
                                        <i class="ri-checkbox-blank-circle-line text-xl"></i>
                                    </span>
                                    <span class="sidebarHidden">Data Assessment</span>
                                </a>
                            </ul>
                        </div>
                        <a href="<?= route_to('calculationprocess'); ?>" class="sidebarCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                            <i class="ri-calculator-line mr-4 align-middle text-xl"></i>
                            <span class="sidebarHidden">Calculation Process</span>
                        </a>
                        <a href="<?= route_to('decissionresult'); ?>" class="sidebarCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                            <i class="ri-flag-2-line mr-4 align-middle text-xl"></i>
                            <span class="sidebarHidden">Decission Result</span>
                        </a>
                        <div class="relative transition">
                            <input class="peer hidden" placeholder="." type="checkbox" id="menu-2" />
                            <button class="sidebarCenter flex peer relative w-full items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:text-rose-600 focus:border-l-4">
                                <i class="ri-file-history-line mr-4 align-middle text-xl"></i>
                                <span class="sidebarHidden">History</span>
                                <label for="menu-2" class="absolute inset-0 h-full w-full cursor-pointer"></label>
                            </button>
                            <i class="sidebarHidden ri-arrow-up-s-line absolute right-0 top-2.5 ml-auto mr-5 text-gray-600 transition peer-checked:rotate-180 peer-hover:text-rose-600"></i>
                            <ul class="duration-400 flex max-h-0 flex-col mx-2 overflow-hidden rounded-xl bg-gray-100 font-medium transition-all duration-300 peer-checked:max-h-96">
                                <a class="sidebarCenter flex items-center mx-2 cursor-pointer border-l-rose-600 py-2 pl-5 text-sm text-gray-600 transition-all duration-100 ease-in-out hover:border-l-4 hover:text-rose-600">
                                    <span class="mr-5">
                                        <i class="ri-checkbox-blank-circle-line text-xl"></i>
                                    </span>
                                    <span class="sidebarHidden">Edit</span>
                                </a>
                                <a class="sidebarCenter flex items-center mx-2 cursor-pointer border-l-rose-600 py-2 pl-5 text-sm text-gray-600 transition-all duration-100 ease-in-out hover:border-l-4 hover:text-rose-600">
                                    <span class="mr-5">
                                        <i class="ri-checkbox-blank-circle-line text-xl"></i>
                                    </span>
                                    <span class="sidebarHidden">Delete</span>
                                </a>
                            </ul>
                        </div>
                        <a href="<?= route_to('usersdata'); ?>" class="sidebarCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                            <i class="ri-user-6-line mr-4 align-middle text-xl"></i>
                            <span class="sidebarHidden">Users Data</span>
                        </a>
                    </nav>
                    <div class="px-8 mt-4">
                        <div class="border-b-2 border-gray-100"></div>
                    </div>
                    <span class="sidebarCenter flex ml-4 mt-10 mb-2 text-xxs font-semibold text-[#757575] uppercase">System</span>
                    <nav>
                        <a id="toggleBtn" type="button" class="sidebarCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                            <i class="ri-expand-width-line mr-4 algin-middle text-xl"></i>
                            <span class="sidebarHidden">Button</span>
                        </a>
                        <a href="logout" class="sidebarCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                            <i class="ri-logout-circle-r-line mr-4 algin-middle text-xl"></i>
                            <span class="sidebarHidden">Logout</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="bg-white flex-1 rounded-tl-lg rounded-bl-lg overflow-y-auto overflow-x-hidden">
            <!-- END HEADER -->