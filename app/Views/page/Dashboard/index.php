<?= view('layout/header'); ?>

<div class="p-6">
    <div class="flex justify-between items-center rounded-tl-lg rounded-bl-lg">
        <div>
            <ul class="space-x-1 flex items-center whitespace-nowrap font-medium text-sm text-gray-500">
                <li class="inline-flex items-center space-x-1">
                    <button class="flex text-gray-300 dark:text-slate-600 space-x-1 items-center cursor-default" disabled>
                        <i class="ri-home-3-line"></i>
                        <span>Home</span>
                    </button>
                    <i class="ri-arrow-right-s-line"></i>
                </li>
            </ul>
        </div>
        <?= view('layout/profile'); ?>
    </div>
</div>

<div class="px-6">
    <div class="flex flex-col">
        <span class="text-lg font-bold text-black dark:text-white">Dashboard</span>
        <span class="text-sm text-black dark:text-white">Presenting data insights through intuitive visualizations.</span>
    </div>
    <div class="bg-gray-300 dark:bg-gray-900 px-4 py-12 mt-4">
        <div class="flex justify-center items-center gap-4 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <div class="flex items-center justify-between space-x-8 px-4 py-8 bg-white dark:bg-slate-800 rounded-lg transform transition-transform duration-300 ease-in-out hover:scale-105">
                <div class="text-black dark:text-white">
                    <h1 class="text-lg font-bold"><?php echo $jumlahAlternatif; ?></h1>
                    <span class="text-sm">Alternative Data</span>
                </div>
                <div>
                    <i class="ri-file-list-3-line text-4xl text-rose-600"></i>
                </div>
            </div>
            <div class="flex items-center justify-between space-x-8 px-4 py-8 bg-white dark:bg-slate-800 rounded-lg transform transition-transform duration-300 ease-in-out hover:scale-105">
                <div class="text-black dark:text-white">
                    <h1 class="text-lg font-bold"><?php echo $jumlahKriteria; ?></h1>
                    <span class="text-sm">Criteria Data</span>
                </div>
                <div>
                    <i class="ri-file-text-line text-4xl text-rose-600"></i>
                </div>
            </div>
            <div class="flex items-center justify-between space-x-8 px-4 py-8 bg-white dark:bg-slate-800 rounded-lg transform transition-transform duration-300 ease-in-out hover:scale-105">
                <div class="text-black dark:text-white">
                    <h1 class="text-lg font-bold"><?php echo $jumlahPenilaian; ?></h1>
                    <span class="text-sm">Decission Result Data</span>
                </div>
                <div>
                    <i class="ri-file-line text-4xl text-rose-600"></i>
                </div>
            </div>
            <div class="flex items-center justify-between space-x-8 px-4 py-8 bg-white dark:bg-slate-800 rounded-lg transform transition-transform duration-300 ease-in-out hover:scale-105">
                <div class="text-black dark:text-white">
                    <h1 class="text-lg font-bold"><?php echo $jumlahUserData; ?></h1>
                    <span class="text-sm">Users Data</span>
                </div>
                <div>
                    <i class="ri-user-6-line text-4xl text-rose-600"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer'); ?>