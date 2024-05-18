<?= view('layout/header'); ?>

<div class="p-6">
    <div class="flex justify-between items-center rounded-tl-lg rounded-bl-lg">
        <div>
            <ul class="space-x-1 flex items-center whitespace-nowrap font-medium text-sm text-gray-500 dark:text-gray-400">
                <li class="inline-flex items-center space-x-1">
                    <button class="flex hover:text-rose-600 space-x-1 items-centerfocus:outline-none cursor-pointer" onclick="window.location.href='<?= route_to('/'); ?>'">
                        <i class="ri-home-3-line"></i>
                        <span>Home</span>
                    </button>
                    <i class="ri-arrow-right-s-line"></i>
                </li>
                <li class="inline-flex items-center space-x-1">
                    <button class="flex text-gray-300 dark:text-slate-600  items-center cursor-default" disabled>
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
        <span class="text-lg font-bold text-black dark:text-white">History</span>
    </div>
    <div class="relative right-0">
        <ul class="relative flex flex-wrap p-1 list-none rounded-xl bg-gray-100 dark:bg-gray-700" data-tabs="tabs" role="list">
            <li class="z-30 flex-auto text-center">
                <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-gray-600 dark:text-gray-300 bg-inherit" data-tab-target="" active="" role="tab" aria-selected="true" aria-controls="app">
                    <span class="ml-1">Delete</span>
                </a>
            </li>
            <li class="z-30 flex-auto text-center">
                <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-gray-600 dark:text-gray-300 bg-inherit" data-tab-target="" role="tab" aria-selected="false" aria-controls="message">
                    <span class="ml-1">Update</span>
                </a>
            </li>
            <li class="z-30 flex-auto text-center">
                <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-gray-600 dark:text-gray-300 bg-inherit" data-tab-target="" role="tab" aria-selected="false" aria-controls="settings">
                    <span class="ml-1">Add</span>
                </a>
            </li>
        </ul>
        <div data-tab-content="" class="mt-2">
            <!-- DELETE -->
            <div class="block opacity-100" id="app" role="tabpanel">
                <div class="py-2">
                    <span class="text-sm text-black dark:text-white">Tracking records of all deleted data entries for accountability and audit purposes.</span>
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
                    <tbody class="text-sm font-thin text-black dark:text-white">
                        <?php foreach ($deleteLogs as $index => $row) : ?>
                            <tr>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $index + 1 ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['username'] ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['activity_type'] ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['description'] ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['table_name'] ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['activity_timestamp'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- EDIT -->
            <div class="hidden opacity-0" id="message" role="tabpanel">
                <div class="py-2">
                    <span class="text-sm text-black dark:text-white">Logging modifications to data entries, ensuring transparency and traceability.</span>
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
                    <tbody class="text-sm font-thin text-black dark:text-white">
                        <?php foreach ($updateLogs as $index => $row) : ?>
                            <tr>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $index + 1 ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['username'] ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['activity_type'] ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['description'] ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['table_name'] ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['activity_timestamp'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- INSERT -->
            <div class="hidden opacity-0" id="settings" role="tabpanel">
                <div class="py-2">
                    <span class="text-sm text-black dark:text-white">Documenting all newly added data entries to maintain comprehensive data history.</span>
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
                    <tbody class="text-sm font-thin text-black dark:text-white">
                        <?php foreach ($addLogs as $index => $row) : ?>
                            <tr>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $index + 1 ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['username'] ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['activity_type'] ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['description'] ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['table_name'] ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['activity_timestamp'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?= view('layout/footer'); ?>