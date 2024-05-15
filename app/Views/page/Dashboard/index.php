<?= view('layout/header'); ?>

<div class="p-4 space-y-4">
    <div class="flex justify-between items-center p-2 rounded-tl-lg rounded-bl-lg">
        <div>
            <ul class="space-x-1 flex items-center whitespace-nowrap font-medium text-sm text-gray-500">
                <li class="inline-flex items-center space-x-1">
                    <button class="flex text-gray-300 space-x-1 items-center cursor-default" disabled>
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

<div class="px-4">
    <div class="p-2 flex flex-col">
        <span class="text-lg font-bold">Dashboard</span>
        <span class="text-sm">Presenting data insights through intuitive visualizations.</span>
    </div>
</div>

<div class="bg-gray-300 px-4 py-12 mx-2">
    <div class="flex justify-center items-center gap-4 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <div class="flex items-center justify-between space-x-8 px-4 py-8 bg-white rounded-lg transform transition-transform duration-300 ease-in-out hover:scale-105">
            <div>
                <h1 class="text-lg font-bold">10</h1>
                <span class="text-sm">Alternative Data</span>
            </div>
            <div>
                <i class="ri-file-list-3-line text-4xl text-rose-600"></i>
            </div>
        </div>
        <div class="flex items-center justify-between space-x-8 px-4 py-8 bg-white rounded-lg transform transition-transform duration-300 ease-in-out hover:scale-105">
            <div>
                <h1 class="text-lg font-bold">20</h1>
                <span class="text-sm">Criteria Data</span>
            </div>
            <div>
                <i class="ri-file-text-line text-4xl text-rose-600"></i>
            </div>
        </div>
        <div class="flex items-center justify-between space-x-8 px-4 py-8 bg-white rounded-lg transform transition-transform duration-300 ease-in-out hover:scale-105">
            <div>
                <h1 class="text-lg font-bold">30</h1>
                <span class="text-sm">Decission Result Data</span>
            </div>
            <div>
                <i class="ri-file-line text-4xl text-rose-600"></i>
            </div>
        </div>
        <div class="flex items-center justify-between space-x-8 px-4 py-8 bg-white rounded-lg transform transition-transform duration-300 ease-in-out hover:scale-105">
            <div>
                <h1 class="text-lg font-bold">40</h1>
                <span class="text-sm">Users Data</span>
            </div>
            <div>
                <i class="ri-user-6-line text-4xl text-rose-600"></i>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer'); ?>