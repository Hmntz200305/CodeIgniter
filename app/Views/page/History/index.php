<?= view('layout/header'); ?>

<div class="p-6">
    <div class="flex justify-between items-center rounded-tl-lg rounded-bl-lg">
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

<div class="px-6">
    <div class="py-2">
        <span class="text-lg font-bold">History</span>
    </div>
    <div class="relative right-0">
        <ul class="relative flex flex-wrap p-1 list-none rounded-xl bg-blue-gray-50/60" data-tabs="tabs" role="list">
            <li class="z-30 flex-auto text-center">
                <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit" data-tab-target="" active="" role="tab" aria-selected="true" aria-controls="app">
                    <span class="ml-1">Delete</span>
                </a>
            </li>
            <li class="z-30 flex-auto text-center">
                <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit" data-tab-target="" role="tab" aria-selected="false" aria-controls="message">
                    <span class="ml-1">Update</span>
                </a>
            </li>
            <li class="z-30 flex-auto text-center">
                <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit" data-tab-target="" role="tab" aria-selected="false" aria-controls="settings">
                    <span class="ml-1">Add</span>
                </a>
            </li>
        </ul>
        <div data-tab-content="" class="mt-2">
            <!-- DELETE -->
            <div class="block opacity-100" id="app" role="tabpanel">
                <div class="py-2">
                    <span class="text-sm">Tracking records of all deleted data entries for accountability and audit purposes.</span>
                </div>
                <div class="flex space-x-4">
                    <button id="modalClearHistoryDeleteOpen" class="mb-2 text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
                        <i class="ri-eraser-line"></i>
                        <span>Clear Table</span>
                    </button>
                </div>
                <table id="historyDelete" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>User</th>
                            <th>Action</th>
                            <th>Description</th>
                            <th>TableName</th>
                            <th>Action Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <?php foreach ($deleteLogs as $index => $row) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['activity_type'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td><?= $row['table_name'] ?></td>
                                <td><?= $row['activity_timestamp'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- EDIT -->
            <div class="hidden opacity-0" id="message" role="tabpanel">
                <div class="py-2">
                    <span class="text-sm">Logging modifications to data entries, ensuring transparency and traceability.</span>
                </div>
                <div class="flex space-x-4">
                    <button id="modalClearHistoryEditOpen" class="mb-2 text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
                        <i class="ri-eraser-line"></i>
                        <span>Clear Table</span>
                    </button>
                </div>
                <table id="historyEdit" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>User</th>
                            <th>Action</th>
                            <th>Description</th>
                            <th>TableName</th>
                            <th>Action Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <?php foreach ($updateLogs as $index => $row) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['activity_type'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td><?= $row['table_name'] ?></td>
                                <td><?= $row['activity_timestamp'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- INSERT -->
            <div class="hidden opacity-0" id="settings" role="tabpanel">
                <div class="py-2">
                    <span class="text-sm">Documenting all newly added data entries to maintain comprehensive data history.</span>
                </div>
                <div class="flex space-x-4">
                    <button id="modalClearHistoryInsertOpen" class="mb-2 text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
                        <i class="ri-eraser-line"></i>
                        <span>Clear Table</span>
                    </button>
                </div>
                <table id="historyInsert" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>User</th>
                            <th>Action</th>
                            <th>Description</th>
                            <th>TableName</th>
                            <th>Action Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <?php foreach ($addLogs as $index => $row) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['activity_type'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td><?= $row['table_name'] ?></td>
                                <td><?= $row['activity_timestamp'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL CLEAR -->
<div class="modalClearHistoryDelete flex fixed inset-0 p-4 flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] hidden">
    <div class="w-full max-w-md bg-white shadow-lg rounded-md p-6 relative">
        <div class="my-6 text-center">
            <div class="inline w-16 h-16 text-7xl text-rose-600">
                <i class="ri-eraser-line"></i>
            </div>
            <h4 class="text-xl font-semibold mt-6">Delete Table?</h4>
            <p class="text-sm text-gray-500 mt-4">You're going to clear this table. Are you sure?</p>
        </div>
        <div class="flex justify-center space-x-4">
            <button id="modalClearHistoryDeleteClose" type="button" class="text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
                Cancel
            </button>
            <button type="button" class="rounded-md bg-rose-600 px-4 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-rose-700">
                Delete
            </button>
        </div>
    </div>
</div>

<div class="modalClearHistoryEdit flex fixed inset-0 p-4 flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] hidden">
    <div class="w-full max-w-md bg-white shadow-lg rounded-md p-6 relative">
        <div class="my-6 text-center">
            <div class="inline w-16 h-16 text-7xl text-rose-600">
                <i class="ri-eraser-line"></i>
            </div>
            <h4 class="text-xl font-semibold mt-6">Delete Table?</h4>
            <p class="text-sm text-gray-500 mt-4">You're going to clear this table. Are you sure?</p>
        </div>
        <div class="flex justify-center space-x-4">
            <button id="modalClearHistoryEditClose" type="button" class="text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
                Cancel
            </button>
            <button type="button" class="rounded-md bg-rose-600 px-4 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-rose-700">
                Delete
            </button>
        </div>
    </div>
</div>

<div class="modalClearHistoryInsert flex fixed inset-0 p-4 flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] hidden">
    <div class="w-full max-w-md bg-white shadow-lg rounded-md p-6 relative">
        <div class="my-6 text-center">
            <div class="inline w-16 h-16 text-7xl text-rose-600">
                <i class="ri-eraser-line"></i>
            </div>
            <h4 class="text-xl font-semibold mt-6">Delete Table?</h4>
            <p class="text-sm text-gray-500 mt-4">You're going to clear this table. Are you sure?</p>
        </div>
        <div class="flex justify-center space-x-4">
            <button id="modalClearHistoryInsertClose" type="button" class="text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
                Cancel
            </button>
            <button type="button" class="rounded-md bg-rose-600 px-4 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-rose-700">
                Delete
            </button>
        </div>
    </div>
</div>


<?= view('layout/footer'); ?>