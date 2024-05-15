<?= view('layout/header'); ?>

<?php if (session()->has('message') && session()->has('message_type')) : ?>
    <script>
        var message = '<?= session('message') ?>';
        var type = '<?= session('message_type') ?>';

        switch (type) {
            case 'warning':
                toggleWarningNotif(message);
                break;
            case 'error':
                toggleFailedNotif(message);
                break;
            case 'success':
                toggleSuccessNotif(message);
                break;
            default:
                break;
        }
    </script>
<?php endif; ?>

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
                        <span>Data Criteria</span>
                    </button>
                </li>
            </ul>
        </div>
        <?= view('layout/profile'); ?>
    </div>
</div>
<div class="px-4">
    <div class="p-2 flex flex-col">
        <span class="text-lg font-bold">Data Criteria</span>
        <span class="text-sm">Defining specific criteria for refining data selection and analysis.</span>
    </div>
</div>

<!-- ALTERNATIVE -->
<div class="p-4">
    <a href="<?= route_to('datacriteria/adddata'); ?>">
        <button class="mb-2 text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
            <i class="ri-file-add-line"></i>
            <span>Add Data</span>
        </button>
    </a>
    <table id="dataCriteria" class="display nowrap" style="width:100%">
        <thead class="text-sm font-bold">
            <tr>
                <th class="w-12">No.</th>
                <th>Code</th>
                <th>Criteria</th>
                <th>Weight</th>
                <th class="w-24">Action</th>
            </tr>
        </thead>
        <tbody class="text-sm font-thin">
            <?php foreach ($Kriteria as $index => $row) : ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $row['kode_kriteria']; ?></td>
                    <td><?php echo $row['deskripsi_kriteria']; ?></td>
                    <td><?php echo $row['bobot_kriteria']; ?></td>
                    <td>
                        <div class="flex items-center space-x-2 text-lg">
                            <button onclick="showEditCriteria(<?php echo $row['id_kriteria']; ?>)" class="text-green-500 bg-white p-2 w-8 h-8 flex items-center justify-center rounded-xl">
                                <i class="ri-edit-circle-line"></i>
                            </button>
                            <!-- <button class="datacriteria-delete-btn text-red-500 bg-white p-2 w-8 h-8 flex items-center justify-center rounded-xl" data-id="<?php echo $row['id_kriteria']; ?>">
                                <i class="ri-delete-bin-3-line"></i>
                            </button> -->
                            <form action="datacriteria/deleteprocess//<?php echo $row['id_kriteria']; ?>" method="POST" id="deleteForm_<?php echo $row['id_kriteria']; ?>" onsubmit="return showConfirmationDeleteModalCriteria(this);">
                                <button type="submit" class="dataassesment-delete-btn text-red-500 bg-white p-2 w-8 h-8 flex items-center justify-center rounded-xl">
                                    <i class="ri-delete-bin-3-line"></i>
                                </button>
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div id="modalDeleteCriteria" class="flex fixed inset-0 p-4 flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] hidden">
    <div class="w-full max-w-md bg-white shadow-lg rounded-md p-6 relative">
        <div class="my-6 text-center">
            <div class="inline w-16 h-16 text-7xl text-rose-600">
                <i class="ri-delete-bin-3-line"></i>
            </div>
            <h4 class="text-xl font-semibold mt-6">Delete Data?</h4>
            <p class="text-sm text-gray-500 mt-4">You're going to delete this data. Are you sure?</p>
        </div>
        <div class="flex justify-center space-x-4">
            <button id="modalDeleteCriteriaClose" type="button" class="text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded">
                Cancel
            </button>
            <button id="modalDeleteButtonCriteria" type="button" class="rounded-md bg-rose-600 px-4 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-rose-700">
                Delete
            </button>
        </div>
    </div>
</div>


<?= view('layout/footer'); ?>