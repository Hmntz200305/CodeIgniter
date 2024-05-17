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
                        <span>Decission Result</span>
                    </button>
                </li>
            </ul>
        </div>
        <?= view('layout/profile'); ?>
    </div>
</div>

<div class="px-6">
    <div class="py-4 flex flex-col">
        <span class="text-lg font-bold">Vendor/Suplier performance data</span>
        <span class="text-sm">Viewing outcomes and conclusions derived from data analysis to inform decision-making processes.</span>
    </div>
    <div>
        <button id="modalClearDecissionResultOpen" class="mb-2 text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
            <i class="ri-eraser-line"></i>
            <span>Clear Table</span>
        </button>
        <table id="decissionResult" class="display nowrap" style="width:100%">
            <thead class="text-sm font-bold">
                <tr>
                    <th class="w-12">No.</th>
                    <th>Code</th>
                    <th>Periode</th>
                    <th>List of Alternative (supplier)</th>
                    <th>Score</th>
                    <th class="w-24">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm font-thin">
                <?php foreach ($hasil as $index => $row) : ?>
                    <tr>
                        <td><?= $index + 1 ?>
                        <td><?= $row['nama_hasil'] ?></td>
                        <td><?= $row['periode_hasil'] ?></td>
                        <td><?= $row['nama_alternatif'] ?></td>
                        <td><?= $row['total_nilai'] ?></td>
                        <td class="align-top">
                            <div class="flex items-center text-lg space-x-2">
                                <button class="text-gray-600 bg-white p-2 w-8 h-8 flex items-center justify-center rounded-xl">
                                    <i class="ri-printer-line"></i>
                                </button>
                                <button id="modalDeleteDecissionResultOpen" class="text-red-500 bg-white p-2 w-8 h-8 flex items-center justify-center rounded-xl">
                                    <i class="ri-delete-bin-3-line"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<!-- MODAL DELETE -->
<div class="modalDeleteDecissionResult flex fixed inset-0 p-4 flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] hidden">
    <div class="w-full max-w-md bg-white shadow-lg rounded-md p-6 relative">
        <div class="my-6 text-center">
            <div class="inline w-16 h-16 text-7xl text-rose-600">
                <i class="ri-delete-bin-3-line"></i>
            </div>
            <h4 class="text-xl font-semibold mt-6">Delete Data?</h4>
            <p class="text-sm text-gray-500 mt-4">You're going to delete this data. Are you sure?</p>
        </div>
        <div class="flex justify-center space-x-4">
            <button id="modalDeleteDecissionResultClose" type="button" class="text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
                Cancel
            </button>
            <button type="button" class="rounded-md bg-rose-600 px-4 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-rose-700">
                Delete
            </button>
        </div>
    </div>
</div>

<!-- MODAL CLEAR -->
<div class="modalClearDecissionResult flex fixed inset-0 p-4 flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] hidden">
    <div class="w-full max-w-md bg-white shadow-lg rounded-md p-6 relative">
        <div class="my-6 text-center">
            <div class="inline w-16 h-16 text-7xl text-rose-600">
                <i class="ri-eraser-line"></i>
            </div>
            <h4 class="text-xl font-semibold mt-6">Delete Table?</h4>
            <p class="text-sm text-gray-500 mt-4">You're going to clear this table. Are you sure?</p>
        </div>
        <div class="flex justify-center space-x-4">
            <button id="modalClearDecissionResultClose" type="button" class="text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
                Cancel
            </button>
            <button type="button" class="rounded-md bg-rose-600 px-4 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-rose-700">
                Delete
            </button>
        </div>
    </div>
</div>


<?= view('layout/footer'); ?>