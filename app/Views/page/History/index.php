<?= view('layout/header'); ?>

    <div class="p-4 space-y-4">
        <div class="flex justify-between items-center p-2 rounded-tl-lg rounded-bl-lg">
            <div>
                <ul class="space-x-1 flex items-center whitespace-nowrap font-medium text-sm text-gray-500">
                    <li class="inline-flex items-center space-x-1">
                        <button class="flex hover:text-rose-600 space-x-1 items-centerfocus:outline-none cursor-pointer" onclick="window.location.href='<?= route_to('/'); ?>'">
                            <i class="ri-home-3-line"></i>
                            <span>Home</span>
                        </button>
                        <i class="ri-arrow-right-s-line"></i>
                    </li>
                    <li class="inline-flex items-center space-x-1">
                        <button class="flex text-gray-300 items-center cursor-default" disabled>
                            <span>History</span>
                        </button>
                    </li>
                </ul>
            </div>
            <?= view('layout/profile'); ?>
        </div>
    </div>

    <div class="px-4">
        <div class="p-2 flex flex-col">
            <span class="text-lg font-bold">History</span>
            <span class="text-sm">Tracking and reviewing past activities, changes, and decisions made within the system for reference and analysis.</span>
        </div>
    </div>

    <div class="px-4">
        <div class="relative right-0">
            <ul class="relative flex flex-wrap p-1 list-none rounded-xl bg-blue-gray-50/60" data-tabs="tabs" role="list">
                <li class="z-30 flex-auto text-center">
                    <a
                        class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit"
                        data-tab-target=""
                        active=""
                        role="tab"
                        aria-selected="true"
                        aria-controls="app"
                    >
                        <span class="ml-1">Delete</span>
                    </a>
                </li>
                <li class="z-30 flex-auto text-center">
                    <a
                        class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit"
                        data-tab-target=""
                        role="tab"
                        aria-selected="false"
                        aria-controls="message"
                    >
                        <span class="ml-1">Edit</span>
                    </a>
                </li>
                <li class="z-30 flex-auto text-center">
                    <a
                        class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit"
                        data-tab-target=""
                        role="tab"
                        aria-selected="false"
                        aria-controls="settings"
                    >
                        <span class="ml-1">Insert</span>
                    </a>
                </li>
            </ul>
            <div data-tab-content="" class="mt-2">
                <div class="block opacity-100" id="app" role="tabpanel">
                    <div class="flex space-x-4">
                        <button id="modalClearOpen" class="mb-2 text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
                            <i class="ri-eraser-line"></i>
                            <span>Clear Table</span>
                        </button>
                    </div>
                    <table id="historyDelete" class="display nowrap" style="width:100%">
                        <thead class="text-sm font-bold">
                            <tr>
                                <th class="w-12">No.</th>
                                <th>Action</th>
                                <th>User</th>
                                <th>Action Date</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-thin">
                            <tr>
                                <td>1</td>
                                <td>Deleting</td>
                                <td>Admin</td>
                                <td>32/13/3024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="hidden opacity-0" id="message" role="tabpanel">
                    <div class="flex space-x-4">
                        <button id="modalClearOpen" class="mb-2 text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
                            <i class="ri-eraser-line"></i>
                            <span>Clear Table</span>
                        </button>
                    </div>
                    <table id="historyEdit" class="display nowrap" style="width:100%">
                        <thead class="text-sm font-bold">
                            <tr>
                                <th class="w-12">No.</th>
                                <th>Action</th>
                                <th>User</th>
                                <th>Action Date</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-thin">
                            <tr>
                                <td>1</td>
                                <td>Deleting</td>
                                <td>Admin</td>
                                <td>32/13/3024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="hidden opacity-0" id="settings" role="tabpanel">
                    <div class="flex space-x-4">
                        <button id="modalClearOpen" class="mb-2 text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
                            <i class="ri-eraser-line"></i>
                            <span>Clear Table</span>
                        </button>
                    </div>
                    <table id="historyInsert" class="display nowrap" style="width:100%">
                        <thead class="text-sm font-bold">
                            <tr>
                                <th class="w-12">No.</th>
                                <th>Action</th>
                                <th>User</th>
                                <th>Action Date</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-thin">
                            <tr>
                                <td>1</td>
                                <td>Deleting</td>
                                <td>Admin</td>
                                <td>32/13/3024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?= view('layout/footer'); ?>
