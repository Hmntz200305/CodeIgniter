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
                    <a class="flex hover:text-rose-600 space-x-1 items-center cursor-pointer" onclick="window.location.href='<?= route_to('/'); ?>'">
                        <i class="ri-home-3-line"></i>
                        <span>Home</span>
                    </a>
                    <i class="ri-arrow-right-s-line"></i>
                </li>
                <li class="inline-flex items-center space-x-1">
                    <a class="flex hover:text-rose-600 items-center cursor-pointer" onclick="window.location.href='<?= route_to('dataalternative'); ?>'">
                        <span>Data Alternatif</span>
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
        <span class="text-lg font-bold">Add Data Alternative</span>
        <span class="text-sm">Effortlessly inputting additional data sources for expanded analysis capabilities.</span>
    </div>
</div>

<div class="p-4">
    <div class="mt-10 mx-auto lg:w-1/2 sm:w-full">
        <form class="space-y-6" method="post" action="<?php echo site_url('dataalternative/adddata/addprocess'); ?>">
            <div>
                <label for="username" class="block text-sm font-medium leading-6 text-gray-600">Code</label>
                <div class="mt-2 relative w-full min-w-[200px] h-10">
                    <input type="text" id="kode_alternatif" name="kode_alternatif" placeholder="" value="<?= old('kode_alternatif'); ?>" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-gray-900" />
                    <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-gray-900 before:border-blue-gray-200 peer-focus:before:!border-gray-900 after:border-blue-gray-200 peer-focus:after:!border-gray-900">
                        Enter new code
                    </label>
                    <?= validation_show_error('kode_alternatif') ?>
                </div>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium leading-6 text-gray-600">Alternative</label>
                <div class="mt-2 relative w-full min-w-[200px] h-10">
                    <input type="text" id="nama_alternatif" name="nama_alternatif" placeholder="" value="<?= old('nama_alternatif'); ?>" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-gray-900" />
                    <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-gray-900 before:border-blue-gray-200 peer-focus:before:!border-gray-900 after:border-blue-gray-200 peer-focus:after:!border-gray-900">
                        Enter new alternative
                    </label>
                    <?= validation_show_error('nama_alternatif') ?>
                </div>
            </div>
            <div class="flex space-x-4">
                <button onclick="window.location.href='<?= route_to('dataalternative'); ?>'" type="button" class="text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-1.5 px-4 rounded">
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