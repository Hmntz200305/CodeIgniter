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
                            <span>Calculation Process</span>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="inline-flex items-center">
                <span class="font-semibold text-sm text-rose-600">Admin</span>
            </div>
        </div>
    </div>

    <div class="px-4 mb-10">
        <div class="p-2 flex flex-col">
            <span class="text-lg font-bold">Calculation Process</span>
            <span class="text-sm">???</span>
        </div>
    </div>

    <div class="px-4">
        <div class="relative mb-3">
            <button class="accordionHandler mb-4 flex items-center text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 focus:border-rose-600 focus:text-rose-600 py-2 px-3 rounded w-full text-left transition-all ease-in border-solid cursor-pointer group">
                <span>1. Data for each product against Criteria</span>
            </button>
            <div class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <table id="firstTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <th>Durability</th>
                            <th>Age</th>
                            <th>Price</th>
                            <th>After-sales Service</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>5</td>
                            <td>5</td>
                            <td>4</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>5</td>
                            <td>5</td>
                            <td>4</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td colspan="2">Max Value</td>
                            <td class="hidden"></td> <!-- INI JANGAN DIHAPUS CUY -->
                            <td class="bg-rose-600 text-white">5</td>
                            <td class="bg-rose-600 text-white">5</td>
                            <td class="bg-rose-600 text-white">5</td>
                            <td class="bg-rose-600 text-white">3</td>
                        </tr>
                        <tr>
                            <td colspan="2">Min Value</td>
                            <td class="hidden"></td> <!-- INI JANGAN DIHAPUS CUY -->
                            <td class="bg-rose-600 text-white">2</td>
                            <td class="bg-rose-600 text-white">3</td>
                            <td class="bg-rose-600 text-white">3</td>
                            <td class="bg-rose-600 text-white">3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="px-4">
        <div class="relative mb-3">
            <button class="accordionHandler focus:border-rose-600 focus:text-rose-600 mb-4 flex items-center text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded w-full text-left transition-all ease-in border-solid cursor-pointer group">
                <span>2. Calculating normalization values</span>
            </button>
            <div class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <table id="secondTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <th>Durability</th>
                            <th>Age</th>
                            <th>Price</th>
                            <th>After-sales Service</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>5/5</td>
                            <td>5/5</td>
                            <td>3/4</td>
                            <td>7/7</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>4/5</td>
                            <td>4/5</td>
                            <td>3/3</td>
                            <td>6/7</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="px-4">
        <div class="relative mb-3">
            <button class="accordionHandler focus:border-rose-600 focus:text-rose-600 mb-4 flex items-center text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded w-full text-left transition-all ease-in border-solid cursor-pointer group">
                <span>3. Normalization result</span>
            </button>
            <div class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <table id="thirdTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <th>Durability</th>
                            <th>Age</th>
                            <th>Price</th>
                            <th>After-sales Service</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>0.75</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>0.8</td>
                            <td>0.8</td>
                            <td>1</td>
                            <td>0.8751</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="px-4">
        <div class="relative mb-3">
            <button class="accordionHandler focus:border-rose-600 focus:text-rose-600 mb-4 flex items-center text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded w-full text-left transition-all ease-in border-solid cursor-pointer group">
                <span>4. Calculating Preference values</span>
            </button>
            <div class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <table id="fourthTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <th>Durability</th>
                            <th>Age</th>
                            <th>Price</th>
                            <th>After-sales Service</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>0.75</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>0.8</td>
                            <td>0.8</td>
                            <td>1</td>
                            <td>0.8751</td>
                        </tr>
                    </tbody>
                    <tfoot class="text-sm font-bold">
                        <tr>
                            <td colspan="2">Criteria Weight</td>
                            <td>0.2</td>
                            <td>0.3</td>
                            <td>0.35</td>
                            <td>0.15</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="px-4">
        <div class="relative mb-3">
            <button class="accordionHandler focus:border-rose-600 focus:text-rose-600 mb-4 flex items-center text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded w-full text-left transition-all ease-in border-solid cursor-pointer group">
                <span>5. Preference result</span>
            </button>
            <div class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <table id="fifthTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <th>Durability</th>
                            <th>Age</th>
                            <th>Price</th>
                            <th>After-sales Service</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>0.2</td>
                            <td>0.3</td>
                            <td>0.263</td>
                            <td>0.15</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>0.16</td>
                            <td>0.24</td>
                            <td>0.35</td>
                            <td>0.129</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="px-4">
        <div class="relative mb-3">
            <button class="accordionHandler focus:border-rose-600 focus:text-rose-600 mb-4 flex items-center text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded w-full text-left transition-all ease-in border-solid cursor-pointer group">
                <span>6. Calculating total Preference values</span>
            </button>
            <div class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <table id="sixthTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <th>Durability</th>
                            <th>Age</th>
                            <th>Price</th>
                            <th>After-sales Service</th>
                            <th>Total Preference Values</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>0.2</td>
                            <td>0.3</td>
                            <td>0.263</td>
                            <td>0.15</td>
                            <td class="bg-rose-600 text-white">0.91</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>0.16</td>
                            <td>0.24</td>
                            <td>0.35</td>
                            <td>0.129</td>
                            <td class="bg-rose-600 text-white">0.88</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="px-4">
        <div class="relative mb-3">
            <button class="accordionHandler focus:border-rose-600 focus:text-rose-600 mb-4 flex items-center text-gray-600 text-sm font-medium hover:text-rose-600 border-l-4 hover:border-rose-600 py-2 px-3 rounded w-full text-left transition-all ease-in border-solid cursor-pointer group">
                <span>7. Ranking</span>
            </button>
            <div class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
            <table id="seventhTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative Name</th>
                            <th>Preference Value</th>
                            <th>Ranking</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>0.91</td>
                            <td class="bg-rose-600 text-white">1</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>0.88</td>
                            <td class="bg-rose-600 text-white">2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- <div class="p-4">
        <div class="flex flex-col">
            <div class="pb-14">
                <div class="mb-2">
                    <span class="text-gray-600 text-medium lg:text-base sm:text-sm">1. Data for each product against Criteria</span>
                </div>
                <table id="firstTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <th>Durability</th>
                            <th>Age</th>
                            <th>Price</th>
                            <th>After-sales Service</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>5</td>
                            <td>5</td>
                            <td>4</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>5</td>
                            <td>5</td>
                            <td>4</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td colspan="2">Max Value</td>
                            <td class="hidden"></td>
                            <td class="bg-rose-600 text-white">5</td>
                            <td class="bg-rose-600 text-white">5</td>
                            <td class="bg-rose-600 text-white">5</td>
                            <td class="bg-rose-600 text-white">3</td>
                        </tr>
                        <tr>
                            <td colspan="2">Min Value</td>
                            <td class="hidden"></td>
                            <td class="bg-rose-600 text-white">2</td>
                            <td class="bg-rose-600 text-white">3</td>
                            <td class="bg-rose-600 text-white">3</td>
                            <td class="bg-rose-600 text-white">3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pb-14">
                <div class="mb-2">
                    <span class="text-gray-600 text-medium lg:text-base sm:text-sm">2. Calculating normalization Values</span>
                </div>
                <table id="secondTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <th>Durability</th>
                            <th>Age</th>
                            <th>Price</th>
                            <th>After-sales Service</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>5/5</td>
                            <td>5/5</td>
                            <td>3/4</td>
                            <td>7/7</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>4/5</td>
                            <td>4/5</td>
                            <td>3/3</td>
                            <td>6/7</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pb-14">
                <div class="mb-2">
                    <span class="text-gray-600 text-medium lg:text-base sm:text-sm">3. Normalization Result</span>
                </div>
                <table id="thirdTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <th>Durability</th>
                            <th>Age</th>
                            <th>Price</th>
                            <th>After-sales Service</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>0.75</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>0.8</td>
                            <td>0.8</td>
                            <td>1</td>
                            <td>0.8751</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pb-14">
                <div class="mb-2">
                    <span class="text-gray-600 text-medium lg:text-base sm:text-sm">4. Calculating preference Values</span>
                </div>
                <table id="fourthTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <th>Durability</th>
                            <th>Age</th>
                            <th>Price</th>
                            <th>After-sales Service</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>0.75</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>0.8</td>
                            <td>0.8</td>
                            <td>1</td>
                            <td>0.8751</td>
                        </tr>
                    </tbody>
                    <tfoot class="text-sm font-bold">
                        <tr>
                            <td colspan="2">Criteria Weight</td>
                            <td>0.2</td>
                            <td>0.3</td>
                            <td>0.35</td>
                            <td>0.15</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="pb-14">
                <div class="mb-2">
                    <span class="text-gray-600 text-medium lg:text-base sm:text-sm">5. Preference Result</span>
                </div>
                <table id="fifthTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <th>Durability</th>
                            <th>Age</th>
                            <th>Price</th>
                            <th>After-sales Service</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>0.2</td>
                            <td>0.3</td>
                            <td>0.263</td>
                            <td>0.15</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>0.16</td>
                            <td>0.24</td>
                            <td>0.35</td>
                            <td>0.129</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pb-14">
                <div class="mb-2">
                    <span class="text-gray-600 text-medium lg:text-base sm:text-sm">6. Calculating total Preference values</span>
                </div>
                <table id="sixthTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <th>Durability</th>
                            <th>Age</th>
                            <th>Price</th>
                            <th>After-sales Service</th>
                            <th>Total Preference Values</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>0.2</td>
                            <td>0.3</td>
                            <td>0.263</td>
                            <td>0.15</td>
                            <td class="bg-rose-600 text-white">0.91</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>0.16</td>
                            <td>0.24</td>
                            <td>0.35</td>
                            <td>0.129</td>
                            <td class="bg-rose-600 text-white">0.88</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pb-14">
                <div class="mb-2">
                    <span class="text-gray-600 text-medium lg:text-base sm:text-sm">7. Ranking</span>
                </div>
                <table id="seventhTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative Name</th>
                            <th>Preference Value</th>
                            <th>Ranking</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin">
                        <tr>
                            <td>1</td>
                            <td>Product 1</td>
                            <td>0.91</td>
                            <td class="bg-rose-600 text-white">1</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product 2</td>
                            <td>0.88</td>
                            <td class="bg-rose-600 text-white">2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->

<?= view('layout/footer'); ?>
