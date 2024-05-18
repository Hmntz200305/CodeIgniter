<?= view('layout/header'); ?>

<?php if (session()->has('message') && session()->has('message_type')) : ?>
    <script>
        var message = '<?= session('message') ?>';
        var type = '<?= session('message_type') ?>'; // Menggunakan string

        switch (type) {
            case 'warning': // Membandingkan dengan string
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

<div class="p-6">
    <div class="flex justify-between items-center rounded-tl-lg rounded-bl-lg">
        <div>
            <ul class="space-x-1 flex items-center whitespace-nowrap font-medium text-sm text-gray-500 dark:text-gray-400">
                <li class="inline-flex items-center space-x-1">
                    <a class="flex hover:text-rose-600 space-x-1 items-center cursor-pointer" onclick="window.location.href='<?= route_to('/'); ?>'">
                        <i class="ri-home-3-line"></i>
                        <span>Home</span>
                    </a>
                    <i class="ri-arrow-right-s-line"></i>
                </li>
                <li class="inline-flex items-center space-x-1">
                    <a class="flex hover:text-rose-600 items-center cursor-pointer" onclick="window.location.href='<?= route_to('dataassessment'); ?>'">
                        <span>Data Assessment</span>
                    </a>
                    <i class="ri-arrow-right-s-line"></i>
                </li>
                <li class="inline-flex items-center space-x-1">
                    <a class="flex text-gray-300 dark:text-slate-600 items-center cursor-default" disabled>
                        <span>Add Data</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="inline-flex items-center">
            <span class="font-semibold text-sm text-rose-600">Admin</span>
        </div>
    </div>
</div>

<div class="px-6">
    <div class="py-4 flex flex-col">
        <span class="text-lg font-bold text-black dark:text-white">Data Assessment</span>
        <span class="text-sm text-black dark:text-white">Effortlessly inputting additional data sources for expanded analysis capabilities.</span>
    </div>
    <div class="mt-10 grid sm:grid-cols-1 lg:grid-cols-2">
        <div class="flex flex-col">
            <span class="font-medium mb-4 text-gray-600 dark:text-gray-300">Value Explanation:</span>
            <div class="flex space-x-6">
                <div class="flex flex-col">
                    <span class="text-gray-600 dark:text-gray-300 text-xs">*For the criteria of Durability, Age, & Price</span>
                    <span class="mt-2 ml-5 text-gray-600 dark:text-gray-300 text-xs">1 = Very Low <br> 2 = Low <br> 3 = Fair <br> 4 = High <br> 5 = Very High </span>
                </div>
                <div class="flex flex-col">
                    <span class="text-gray-600 dark:text-gray-300 text-xs">*For the criterion of After-sales Service</span>
                    <span class="mt-2 ml-5 text-gray-600 dark:text-gray-300 text-xs">1 = Both elements are equally important <br> 3 = One element is slightly more important than the other <br> 5 = One element is more important than the other <br> 7 = One element is significantly more important than the other <br> 9 = One element is absolutely more important than the other <br> 2, 4, 6, 8 = Values between two adjacent considerations </span>
                </div>
            </div>
        </div>
        <form class="space-y-6" method="post" action="<?php echo site_url('dataassessment/adddata/addprocess'); ?>">
            <div>
                <label class="block text-sm font-medium leading-6 text-gray-600 dark:text-gray-300">Period</label>
                <div class="mt-2 relative h-10 min-w-[200px]">
                    <select id="periode_penilaian" name="periode_penilaian" class="peer w-full h-full bg-transparent text-blue-gray-700 dark:text-gray-300 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-rose-600" >
                        <option class="bg-white text-black dark:bg-gray-800 dark:text-white" value="" <?= old('periode_penilaian') == '' ? 'selected' : '' ?>></option>
                        <option class="bg-white text-black dark:bg-gray-800 dark:text-white" value="2023" <?= old('periode_penilaian') == '2024' ? 'selected' : '' ?>>2024</option>
                        <option class="bg-white text-black dark:bg-gray-800 dark:text-white" value="2024" <?= old('periode_penilaian') == '2025' ? 'selected' : '' ?>>2025</option>
                    </select>
                    <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-rose-600 before:border-blue-gray-200 peer-focus:before:!border-rose-600 after:border-blue-gray-200 peer-focus:after:!border-rose-600">
                        Enter new periode
                    </label>
                    <div class="text-red-600 flex items-center justify-start space-x-1 text-xs font-thin">
                        <span>
                            <?= validation_show_error('periode_penilaian') ?>
                        </span>
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium leading-6 text-gray-600 dark:text-gray-300">Alternative</label>
                <div class="mt-2 relative h-10 min-w-[200px]">
                    <select id="alternatif_penilaian" name="alternatif_penilaian" class="peer w-full h-full bg-transparent text-blue-gray-700 dark:text-gray-300 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-rose-600" >
                        <option class="bg-white text-black dark:bg-gray-800 dark:text-white" value="" <?= old('alternatif_penilaian') == '' ? 'selected' : '' ?>></option>
                        <?php foreach ($alternatif as $alt) : ?>
                            <option class="bg-white text-black dark:bg-gray-800 dark:text-white" value="<?= $alt['id_alternatif'] ?>" <?= old('alternatif_penilaian') == $alt['id_alternatif'] ? 'selected' : '' ?>><?= $alt['nama_alternatif'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-rose-600 before:border-blue-gray-200 peer-focus:before:!border-rose-600 after:border-blue-gray-200 peer-focus:after:!border-rose-600">
                        Enter new alternative
                    </label>
                    <div class="text-red-600 flex items-center justify-start space-x-1 text-xs font-thin">
                        <span>
                            <?= validation_show_error('alternatif_penilaian') ?>
                        </span>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex justify-between">
                    <label class="block text-sm font-medium leading-6 text-gray-600 dark:text-gray-300">Criteria</label>
                    <label id="valueLabel" class="block text-sm font-medium leading-6 text-gray-600 dark:text-gray-300">Value</label>
                </div>
                <div class="flex flex-col space-y-2">
                    <?php foreach ($kriteria as $krit) : ?>
                        <?php
                        $checkboxId = 'checkbox_' . $krit['id_kriteria'];
                        $selectId = 'select_' . $krit['id_kriteria'];
                        $labelId = 'label_' . $krit['id_kriteria'];
                        ?>
                        <div class="flex justify-between items-center">
                            <div class="inline-flex items-center">
                                <label class="relative flex items-center p-3 rounded-full cursor-pointer" htmlFor="<?php echo $checkboxId; ?>">
                                    <input type="checkbox" id="<?php echo $checkboxId; ?>" name="checkbox[<?php echo $krit['id_kriteria']; ?>]" <?php if (old('checkbox.' . $krit['id_kriteria']) == 'on') : ?> checked <?php endif; ?> class="checkboxInput before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-rose-600 checked:bg-rose-600 checked:before:bg-rose-600 hover:before:opacity-10" />
                                    <span class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                        <i class="ri-check-line w-3.5 h-3"></i>
                                    </span>
                                </label>
                                <span class="font-medium text-gray-600 text-sm"><?php echo $krit['deskripsi_kriteria']; ?></span>
                            </div>
                            <div class="relative h-10 w-1/2">
                                <select id="<?php echo $selectId; ?>" name="kriteria_penilaian[<?php echo $krit['id_kriteria']; ?>]" class="peer w-full h-full bg-transparent text-blue-gray-700 dark:text-gray-300 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-rose-600 <?php if (old('checkbox.' . $krit['id_kriteria']) != 'on') : ?> hidden <?php endif; ?>" placeholder="Enter new value">
                                    <option class="bg-white text-black dark:bg-gray-800 dark:text-white" value="" <?= old('kriteria_penilaian.' . $krit['id_kriteria']) == '' ? 'selected' : '' ?>></option>
                                    <?php for ($i = 1; $i <= 9; $i++) : ?>
                                        <option class="bg-white text-black dark:bg-gray-800 dark:text-white" value="<?php echo $i ?>" <?= old('kriteria_penilaian.' . $krit['id_kriteria']) == $i ? 'selected' : '' ?>><?php echo $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                <label id="<?php echo $labelId; ?>" class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-rose-600 before:border-blue-gray-200 peer-focus:before:!border-rose-600 after:border-blue-gray-200 peer-focus:after:!border-rose-600">
                                    Enter new value
                                </label>
                                <?= validation_show_error('kriteria_penilaian.' . $krit['id_kriteria']) ?>
                            </div>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const checkboxes = document.querySelectorAll('.checkboxInput');
                                const valueLabel = document.getElementById('valueLabel');

                                function toggleValueLabel() {
                                    let anyChecked = false;
                                    checkboxes.forEach(checkbox => {
                                        if (checkbox.checked) {
                                            anyChecked = true;
                                        }
                                    });
                                    if (anyChecked) {
                                        valueLabel.classList.remove('hidden');
                                    } else {
                                        valueLabel.classList.add('hidden');
                                    }
                                }

                                checkboxes.forEach(checkbox => {
                                    const select = document.getElementById('select_' + checkbox.id.replace('checkbox_', ''));
                                    const label = document.getElementById('label_' + checkbox.id.replace('checkbox_', ''));
                                    if (!checkbox.checked) {
                                        select.classList.add('hidden');
                                        label.classList.add('hidden');
                                    }

                                    checkbox.addEventListener('change', function() {
                                        if (this.checked) {
                                            select.classList.remove('hidden');
                                            label.classList.remove('hidden');
                                        } else {
                                            select.classList.add('hidden');
                                            label.classList.add('hidden');
                                        }
                                        toggleValueLabel();
                                    });
                                });

                                toggleValueLabel();
                            });
                        </script>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="flex space-x-4">
                <button onclick="window.location.href='<?= route_to('dataassessment'); ?>'" type="button" class="text-gray-600 dark:text-gray-300 border-gray-200 dark:border-gray-700 text-sm font-medium hover:text-rose-600 dark:hover:text-rose-600 border-l-4 hover:border-rose-600 dark:hover:border-rose-600 py-1.5 px-4 rounded">
                    Back
                </button>
                <button type="submit" class="rounded-md bg-rose-600 px-4 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-rose-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>


<?= view('layout/footer'); ?>