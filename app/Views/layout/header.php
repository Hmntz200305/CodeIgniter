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
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">

    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400,401,500,501,700,701,900,901,1,2&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/ju/jq-3.7.0/jszip-3.10.1/dt-2.0.7/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.2/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.2/sb-1.7.1/sp-2.3.1/sl-2.0.1/sr-1.4.1/datatables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/ju/jq-3.7.0/jszip-3.10.1/dt-2.0.7/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.2/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.2/sb-1.7.1/sp-2.3.1/sl-2.0.1/sr-1.4.1/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="<?= base_url('js/script.js'); ?>"></script>
</head>

<body class="bg-gray-300 overflow-hidden ">
    <div id="successNotif" class="z-50 hidden fixed top-4 right-4 bg-white shadow-lg border border-gray-200 p-4 rounded-lg flex items-center space-x-4 max-w-sm md:max-w-md lg:max-w-lg">
        <div class="flex-shrink-0">
            <i class="ri-check-line text-green-500 text-2xl"></i>
        </div>
        <div>
            <p class="font-medium text-gray-600">Success !</p>
            <p id="successMessage" class="text-sm text-gray-400"></p>
        </div>
    </div>

    <div id="failedNotif" class="z-50 hidden fixed top-4 right-4 bg-white shadow-lg border border-gray-200 p-4 rounded-lg flex items-center space-x-4 max-w-sm md:max-w-md lg:max-w-lg">
        <div class="flex-shrink-0">
            <i class="ri-close-line text-red-500 text-2xl"></i>
        </div>
        <div>
            <p class="font-medium text-gray-600">Error !</p>
            <p id="errorMessage" class="text-sm text-gray-400"></p>
        </div>
    </div>

    <div id="warningNotif" class="z-50 hidden fixed top-4 right-4 bg-white shadow-lg border border-gray-200 p-4 rounded-lg flex items-center space-x-4 max-w-sm md:max-w-md lg:max-w-lg">
        <div class="flex-shrink-0">
            <i class="ri-error-warning-line text-orange-500 text-2xl"></i>
        </div>
        <div>
            <p class="font-medium text-gray-600">Warning !</p>
            <p id="warningMessage" class="text-sm text-gray-400"></p>
        </div>
    </div>

    <div class="flex space-x-2 py-2 h-screen">
        <!-- SIDEBAR -->
        <div id="sidebar" class="flex-none transition-all duration-300" style="width: 256px;">
            <div class="flex h-full flex-grow flex-col rounded-br-lg rounded-tr-lg bg-white pt-5 shadow-rose-600">
                <div class="p-4 flex justify-center items-center space-x-2">
                    <img src="<?= base_url('assets/img/CILogo.png'); ?>" alt="logo" class="w-8 h-8" />
                    <h1 class="sidebarHidden text-[#d24124] text-xl  transition-all duration-300">
                        Code<span class="font-bold">Igniter</span>
                    </h1>
                </div>
                <div class="px-8 mt-4">
                    <div class="border-b-2 border-gray-100"></div>
                </div>

                <span class="sidebarCenter flex ml-[18px] mt-10 mb-2 text-xxs font-semibold text-[#757575] uppercase">Main</span>
                <div class="flex mt-3 flex-1 flex-col">
                    <nav>
                        <div>
                            <button class="w-full" id="popoverToggleDashboard">
                                <a href="<?= route_to('/'); ?>" title="" class="iconCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                                    <i class="ri-dashboard-horizontal-line align-middle text-xl"></i>
                                    <span class="sidebarHidden ml-4">Dashboard</span>
                                </a>
                            </button>
                            <span id="popoverContentDashboard" class="absolute z-10 p-3 text-sm font-semibold bg-rose-600 rounded-r-lg text-white w-max opacity-0 pointer-events-none transition-opacity duration-300">
                                Dashboard
                            </span>
                        </div>
                        <div class="transition">
                            <input class="peer hidden" placeholder="." type="checkbox" id="menu-1" />
                            <button class="iconCenter flex peer relative w-full items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:text-rose-600">
                                <i class="ri-dropdown-list align-middle text-xl"></i>
                                <span class="sidebarHidden ml-4">Data</span>
                                <label for="menu-1" class="absolute inset-0 h-full w-full cursor-pointer"></label>
                            </button>
                            <ul class="sidebarUl duration-400 flex max-h-0 flex-col mx-2 overflow-hidden rounded-xl bg-gray-100 font-medium transition-all duration-300 peer-checked:max-h-96">
                                <div>
                                    <button class="w-full" id="popoverToggleAlternative">
                                        <a href="<?= route_to('dataalternative'); ?>" class="iconCenter flex items-center mx-2 cursor-pointer py-2 pl-5 text-sm text-gray-600 transition-all duration-100 ease-in-out  hover:text-rose-600">
                                            <span class="mr-5">
                                                <i class="ri-checkbox-blank-circle-line text-xl"></i>
                                            </span>
                                            <span class="sidebarHidden">Alternative</span>
                                        </a>
                                    </button>
                                    <span id="popoverContentAlternative" class="absolute z-10 p-3 text-sm font-semibold bg-rose-600 rounded-r-lg text-white w-max opacity-0 pointer-events-none transition-opacity duration-300">
                                        Data Alternative
                                    </span>
                                </div>
                                <div>
                                    <button class="w-full" id='popoverToggleCriteria'>
                                        <a href="<?= route_to('datacriteria'); ?>" class="iconCenter flex items-center mx-2 cursor-pointer py-2 pl-5 text-sm text-gray-600 transition-all duration-100 ease-in-out hover:text-rose-600">
                                            <span class="mr-5">
                                                <i class="ri-checkbox-blank-circle-line text-xl"></i>
                                            </span>
                                            <span class="sidebarHidden">Criteria</span>
                                        </a>
                                    </button>
                                    <span id="popoverContentCriteria" class="absolute z-10 p-3 text-sm font-semibold bg-rose-600 rounded-r-lg text-white w-max opacity-0 pointer-events-none transition-opacity duration-300">
                                        Data Criteria
                                    </span>
                                </div>
                                <div>
                                    <button class="w-full" id='popoverToggleAssessment'>
                                        <a href="<?= route_to('dataassessment'); ?>" class="iconCenter flex items-center mx-2 cursor-pointer py-2 pl-5 text-sm text-gray-600 transition-all duration-100 ease-in-out hover:text-rose-600">
                                            <span class="mr-5">
                                                <i class="ri-checkbox-blank-circle-line text-xl"></i>
                                            </span>
                                            <span class="sidebarHidden">Assessment</span>
                                        </a>
                                    </button>
                                    <span id="popoverContentAssessment" class="absolute z-10 p-3 text-sm font-semibold bg-rose-600 rounded-r-lg text-white w-max opacity-0 pointer-events-none transition-opacity duration-300">
                                        Data Assessment
                                    </span>
                                </div>
                            </ul>
                        </div>
                        <div>
                            <button class="w-full" id="popoverToggleCalculation">
                                <a href="<?= route_to('calculationprocess'); ?>" class="iconCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                                    <i class="ri-calculator-line align-middle text-xl"></i>
                                    <span class="sidebarHidden ml-4">Calculation Process</span>
                                </a>
                            </button>
                            <span id="popoverContentCalculation" class="absolute z-10 p-3 text-sm font-semibold bg-rose-600 rounded-r-lg text-white w-max opacity-0 pointer-events-none transition-opacity duration-300">
                                Calculation Process
                            </span>
                        </div>
                        <div>
                            <button class="w-full" id="popoverToggleDecission">
                                <a href="<?= route_to('decissionresult'); ?>" class="iconCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                                    <i class="ri-flag-2-line align-middle text-xl"></i>
                                    <span class="sidebarHidden ml-4">Decission Result</span>
                                </a>
                            </button>
                            <span id="popoverContentDecission" class="absolute z-10 p-3 text-sm font-semibold bg-rose-600 rounded-r-lg text-white w-max opacity-0 pointer-events-none transition-opacity duration-300">
                                Decission Result
                            </span>
                        </div>
                        <?php if (session()->get('id_user_level') == 2) : ?>
                            <div>
                                <button class="w-full" id="popoverToggleHistory">
                                    <a href="<?= route_to('history'); ?>" class="iconCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                                        <i class="ri-file-history-line align-middle text-xl"></i>
                                        <span class="sidebarHidden ml-4">History</span>
                                    </a>
                                </button>
                                <span id="popoverContentHistory" class="absolute z-10 p-3 text-sm font-semibold bg-rose-600 rounded-r-lg text-white w-max opacity-0 pointer-events-none transition-opacity duration-300">
                                    History
                                </span>
                            </div>
                            <div>
                                <button class="w-full" id="popoverToggleUsers">
                                    <a href="<?= route_to('usersdata'); ?>" class="iconCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                                        <i class="ri-user-6-line align-middle text-xl"></i>
                                        <span class="sidebarHidden ml-4">Users Data</span>
                                    </a>
                                </button>
                                <span id="popoverContentUsers" class="absolute z-10 p-3 text-sm font-semibold bg-rose-600 rounded-r-lg text-white w-max opacity-0 pointer-events-none transition-opacity duration-300">
                                    Users Data
                                </span>
                            </div>
                        <?php endif; ?>
                    </nav>
                    <div class="px-8 mt-4">
                        <div class="border-b-2 border-gray-100"></div>
                    </div>
                    <span class="sidebarCenter flex ml-[18px] mt-10 mb-2 text-xxs font-semibold text-[#757575] uppercase">System</span>
                    <nav>
                        <button class="w-full relative">
                            <a id="toggleBtn" type="button" class="iconCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                                <i class="ri-expand-width-line align-middle text-xl"></i>
                                <span class="sidebarHidden ml-4">Resize</span>
                            </a>
                        </button>
                        <!-- <button class="w-full relative">
                            <a type="button" class="iconCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                                <i class="ri-toggle-line align-middle text-xl"></i>
                                <i class="ri-toggle-fill align-middle text-xl"></i>
                            </a>
                        </button> -->
                        <button class="w-full mt-auto" id="popoverToggleLogout">
                            <a href="logout" class="iconCenter flex cursor-pointer items-center border-l-rose-600 py-2 px-4 text-sm font-medium text-gray-600 outline-none transition-all duration-100 ease-in-out hover:border-l-4 hover:border-l-rose-600 hover:text-rose-600 focus:border-l-4">
                                <i class="ri-logout-circle-r-line align-middle text-xl"></i>
                                <span class="sidebarHidden ml-4">Logout</span>
                            </a>
                            <a id="popoverContentLogout" href="logout" class="absolute z-10 p-3 text-sm font-semibold bg-rose-600 rounded-r-lg text-white w-max opacity-0 pointer-events-none transition-opacity duration-300">
                                Logout
                            </a>
                        </button>
                    </nav>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="bg-white flex-1 rounded-tl-lg rounded-bl-lg overflow-y-auto overflow-x-hidden">
            <!-- END HEADER -->