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
                    <button class="flex text-gray-300 dark:text-slate-600 items-center cursor-default" disabled>
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
        <span class="text-lg font-bold text-black dark:text-white">Vendor/Suplier performance data</span>
        <span class="text-sm text-black dark:text-white">Viewing outcomes and conclusions derived from data analysis to inform decision-making processes.</span>
    </div>
    <div>
        <button id="modalClearDecissionResultOpen" class="mb-2 text-gray-600 dark:text-gray-300 border-gray-200 dark:border-gray-700 text-sm font-medium hover:text-rose-600 dark:hover:text-rose-600 border-l-4 hover:border-rose-600 dark:hover:border-rose-600 py-2 px-3 rounded">
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
                </tr>
            </thead>
            <tbody class="text-sm font-thin text-black dark:text-white">
                <!-- <?php foreach ($hasil as $index => $row) : ?>
                    <tr>
                        <td class="border border-gray-200 dark:border-gray-700"><?= $index + 1 ?>
                        <td class="border border-gray-200 dark:border-gray-700"><?= $row['nama_hasil'] ?></td>
                        <td class="border border-gray-200 dark:border-gray-700"><?= $row['periode_hasil'] ?></td>
                        <td class="border border-gray-200 dark:border-gray-700"><?= $row['nama_alternatif'] ?></td>
                        <td class="border border-gray-200 dark:border-gray-700"><?= $row['total_nilai'] ?></td>
                    </tr>
                <?php endforeach; ?> -->
                
                <!-- <?php 
                    $groupedData = [];
                    foreach ($hasil as $row) {
                        $groupedData[$row['nama_hasil']][] = $row;
                    }

                    $no = 1;
                    foreach ($groupedData as $code => $rows) {
                        $rowCount = count($rows);
                        foreach ($rows as $index => $row) {
                            echo '<tr>';
                            if ($index == 0) {
                                echo '<td class="border border-gray-200 dark:border-gray-700" rowspan="'.$rowCount.'">'.$no.'</td>';
                                echo '<td class="border border-gray-200 dark:border-gray-700" rowspan="'.$rowCount.'">'.$code.'</td>';
                                $no++;
                            } else {
                                echo '<td class="hidden"></td>'; // Hidden cell to maintain column count
                                echo '<td class="hidden"></td>'; // Hidden cell to maintain column count
                            }
                            echo '<td class="border border-gray-200 dark:border-gray-700">'.$row['periode_hasil'].'</td>';
                            echo '<td class="border border-gray-200 dark:border-gray-700">'.$row['nama_alternatif'].'</td>';
                            echo '<td class="border border-gray-200 dark:border-gray-700">'.$row['total_nilai'].'</td>';
                            echo '</tr>';
                        }
                    }
                ?> -->

                <?php 
                    $groupedData = [];
                    foreach ($hasil as $row) {
                        $groupedData[$row['nama_hasil']][$row['periode_hasil']][] = $row;
                    }

                    $no = 1;
                    foreach ($groupedData as $code => $periods) {
                        $codeRowCount = array_reduce($periods, function($carry, $item) {
                            return $carry + count($item);
                        }, 0);
                        $firstPeriod = true;

                        foreach ($periods as $period => $rows) {
                            $periodRowCount = count($rows);

                            foreach ($rows as $index => $row) {
                                echo '<tr>';
                                if ($index == 0 && $firstPeriod) {
                                    echo '<td class="border border-gray-200 dark:border-gray-700" rowspan="'.$codeRowCount.'">'.$no.'</td>';
                                    echo '<td class="border border-gray-200 dark:border-gray-700" rowspan="'.$codeRowCount.'">'.$code.'</td>';
                                    $no++;
                                } elseif ($index == 0) {
                                    echo '<td class="hidden"></td>';
                                    echo '<td class="hidden"></td>';
                                } else {
                                    echo '<td class="hidden"></td>';
                                    echo '<td class="hidden"></td>';
                                    echo '<td class="hidden"></td>';
                                }

                                if ($index == 0) {
                                    echo '<td class="border border-gray-200 dark:border-gray-700" rowspan="'.$periodRowCount.'">'.$period.'</td>';
                                } else {
                                    echo '<td class="hidden"></td>';
                                }

                                echo '<td class="border border-gray-200 dark:border-gray-700">'.$row['nama_alternatif'].'</td>';
                                echo '<td class="border border-gray-200 dark:border-gray-700">'.$row['total_nilai'].'</td>';
                                echo '</tr>';
                            }
                            $firstPeriod = false;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL CLEAR -->
<div class="modalClearDecissionResult flex fixed inset-0 p-4 flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] hidden">
    <div class="w-full max-w-md bg-white dark:bg-slate-800 shadow-lg rounded-md p-6 relative">
        <div class="my-6 text-center">
            <div class="inline w-16 h-16 text-7xl text-rose-600">
                <i class="ri-eraser-line"></i>
            </div>
            <h4 class="text-xl font-semibold mt-6 text-black dark:text-white">Clear Table?</h4>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-4">You're going to clear this table. Are you sure?</p>
        </div>
        <div class="flex justify-center space-x-4">
            <button id="modalClearDecissionResultClose" type="button" class="text-gray-600 dark:text-gray-300 border-gray-200 dark:border-gray-700 text-sm font-medium hover:text-rose-600 dark:hover:text-rose-600 hover:border-rose-600 dark:hover:border-rose-600 border-l-4 py-2 px-3 rounded">
                Cancel
            </button>
            <button type="button" class="rounded-md bg-rose-600 px-4 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-rose-700">
                Delete
            </button>
        </div>
    </div>
</div>


<?= view('layout/footer'); ?>