<?= view('layout/header'); ?>

<div class="p-4 space-y-4">
    <div class="flex justify-between items-center p-2 rounded-tl-lg rounded-bl-lg">
        <div>
            <ul class="space-x-1 flex items-center whitespace-nowrap font-medium text-sm text-gray-500">
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
                    <a class="flex text-gray-300 items-center cursor-default" disabled>
                        <span>Add Data</span>
                    </a>
                </li>
            </ul>
        </div>
        <?= view('layout/profile'); ?>
    </div>
</div>

<div class="px-4">
    <div class="p-2 flex flex-col">
        <span class="text-lg font-bold">Data Assessment</span>
        <span class="text-sm">Effortlessly inputting additional data sources for expanded analysis capabilities.</span>
    </div>
</div>

<div class="p-4">
    <div class="mt-10 grid sm:grid-cols-1 lg:grid-cols-2">
        <div class="flex flex-col">
            <span class="font-medium mb-4 text-gray-600">Value Explanation:</span>
            <div class="flex space-x-6">
                <div class="flex flex-col">
                    <span class="text-gray-600 text-xs">*For the criteria of Durability, Age, & Price</span>
                    <span class="mt-2 ml-5 text-gray-600 text-xs">1 = Very Low <br> 2 = Low <br> 3 = Fair <br> 4 = High <br> 5 = Very High </span>
                </div>
                <div class="flex flex-col">
                    <span class="text-gray-600 text-xs">*For the criterion of After-sales Service</span>
                    <span class="mt-2 ml-5 text-gray-600 text-xs">1 = Both elements are equally important <br> 3 = One element is slightly more important than the other <br> 5 = One element is more important than the other <br> 7 = One element is significantly more important than the other <br> 9 = One element is absolutely more important than the other <br> 2, 4, 6, 8 = Values between two adjacent considerations </span>
                </div>
            </div>
        </div>
        <form class="space-y-6" method="post" action="<?php echo site_url('dataassessment/adddata/addprocess'); ?>">
            <div>
                <label class="block text-sm font-medium leading-6 text-gray-600">Period</label>
                <div class="mt-2 relative h-10 min-w-[200px]">
                    <select id="periode_penilaian" name="periode_penilaian" class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 empty:!bg-gray-900 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50">
                        <option value="" <?= old('periode_penilaian') == '' ? 'selected' : '' ?>></option>
                        <option value="2023" <?= old('periode_penilaian') == '2023' ? 'selected' : '' ?>>2023</option>
                        <option value="2024" <?= old('periode_penilaian') == '2024' ? 'selected' : '' ?>>2024</option>
                    </select>
                    <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                        Enter new periode
                    </label>
                    <?= validation_show_error('periode_penilaian') ?>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium leading-6 text-gray-600">Alternative</label>
                <div class="mt-2 relative h-10 min-w-[200px]">
                    <select id="alternatif_penilaian" name="alternatif_penilaian" class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 empty:!bg-gray-900 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50">
                        <option value="" <?= old('alternatif_penilaian') == '' ? 'selected' : '' ?>></option>
                        <?php foreach ($alternatif as $alt) : ?>
                            <option value="<?= $alt['id_alternatif'] ?>" <?= old('alternatif_penilaian') == $alt['id_alternatif'] ? 'selected' : '' ?>><?= $alt['nama_alternatif'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                        Enter new alternative
                    </label>
                    <?= validation_show_error('alternatif_penilaian') ?>
                </div>
            </div>
            <div>
                <div class="flex justify-between">
                    <label class="block text-sm font-medium leading-6 text-gray-600">Criteria</label>
                    <label class="block text-sm font-medium leading-6 text-gray-600">Value</label>
                </div>
                <div class="flex flex-col space-y-2">
                    <?php foreach ($kriteria as $krit) : ?>
                        <div class="flex justify-between items-center">
                            <div class="inline-flex items-center">
                                <label class="relative flex items-center p-3 rounded-full cursor-pointer" htmlFor="checkbox">
                                    <input type="checkbox" checked class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-rose-600 checked:bg-rose-600 checked:before:bg-rose-600 hover:before:opacity-10" id="checkbox" />
                                    <span class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                        <i class="ri-check-line w-3.5 h-3"></i>
                                    </span>
                                </label>
                                <span class="font-medium text-gray-600 text-sm"><?php echo $krit['deskripsi_kriteria']; ?></span>
                            </div>
                            <div class="relative h-10 w-1/2">
                                <select id="<?php echo $krit['id_kriteria']; ?>" name="kriteria_penilaian[<?php echo $krit['id_kriteria']; ?>]" class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 empty:!bg-gray-900 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder="Enter new value">
                                    <option value="" <?= old('kriteria_penilaian.' . $krit['id_kriteria']) == '' ? 'selected' : '' ?>></option>
                                    <?php for ($i = 1; $i <= 9; $i++) : ?>
                                        <option value="<?php echo $i ?>" <?= old('kriteria_penilaian.' . $krit['id_kriteria']) == $i ? 'selected' : '' ?>><?php echo $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                    Enter new value
                                </label>
                                <?= validation_show_error('kriteria_penilaian[]') ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="flex space-x-4">
                <button onclick="window.location.href='<?= route_to('dataassessment'); ?>'" type="button" class="text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-1.5 px-4 rounded">
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