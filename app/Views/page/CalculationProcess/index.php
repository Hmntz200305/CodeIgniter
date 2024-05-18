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
                        <span>Calculation Process</span>
                    </button>
                </li>
            </ul>
        </div>
        <?= view('layout/profile'); ?>
    </div>
</div>
<div class="px-6">
    <div class="py-4 flex flex-col">
        <span class="text-lg font-bold text-black dark:text-white">Calculation Process</span>
        <span class="text-sm text-black dark:text-white">Executing complex calculations and algorithms to derive meaningful insights from data.</span>
    </div>
    <div class="mt-4">
        <div class="mb-3">
            <button id="toggleAll" class="text-gray-600 dark:text-gray-300 border-gray-100 dark:border-gray-700 dark:border-gray-700 text-sm font-medium hover:text-rose-600 dark:hover:text-rose-600 border-l-4 hover:border-rose-600 dark:hover:border-rose-600 py-2 px-3 rounded">Open All</button>
        </div>
        <div class=" mb-3">
            <button class="mb-4 flex items-center text-gray-600 dark:text-gray-300 hover:text-rose-600 dark:hover:text-rose-600 border-b hover:border-rose-600 focus:border-rose-600 focus:text-rose-600 text-sm font-medium py-2 px-3  w-full text-left transition-all ease-in border-solid cursor-pointer group" data-collapse-target="1">
                <span>1. Data for each product against Criteria</span>
            </button>
            <div class="h-0 overflow-hidden transition-all duration-300 ease-in-out" data-collapse="1">
                <table id="firstTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <?php foreach ($kriteria as $kriteria_item) : ?>
                                <th><?= $kriteria_item['deskripsi_kriteria'] ?></th>
                            <?php endforeach; ?>

                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin text-black dark:text-white">
                        <?php
                        $no = 1;
                        foreach ($alternatif as $alternatif_item) : ?>
                            <tr>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $no; ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $alternatif_item['nama_alternatif'] ?></td>
                                <?php
                                foreach ($kriteria as $kriteria_item) {
                                ?>
                                    <td class="border border-gray-200 dark:border-gray-700">
                                        <?= $data_pencocokan[$alternatif_item['id_alternatif']][$kriteria_item['id_kriteria']]['nilai'] ?? '-' ?>
                                    </td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                            $no++;
                        endforeach;
                        ?>
                        <tr>
                            <td colspan="2" class="border border-gray-200 dark:border-gray-700">Max Value</td>
                            <td class="border border-gray-200 dark:border-gray-700 hidden"></td>
                            <?php foreach ($maxValues as $kriteria => $maxValue) : ?>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $maxValue ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <td colspan="2" class="border border-gray-200 dark:border-gray-700">Min Value</td>
                            <td class="border border-gray-200 dark:border-gray-700 hidden"></td>
                            <?php foreach ($minValues as $kriteria => $minValue) : ?>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $minValue ?></td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class=" mb-3">
            <button class="mb-4 flex items-center text-gray-600 dark:text-gray-300 hover:text-rose-600 dark:hover:text-rose-600 border-b hover:border-rose-600 focus:border-rose-600 focus:text-rose-600 text-sm font-medium py-2 px-3  w-full text-left transition-all ease-in border-solid cursor-pointer group" data-collapse-target="2">
                <span>2. Calculating normalization values</span>
            </button>
            <div class="h-0 overflow-hidden transition-all duration-300 ease-in-out" data-collapse="2">
                <table id="secondTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <?php
                            $kriteriaModel = new \App\Models\CriteriaModel();
                            $kriteria = $kriteriaModel->findAll();
                            foreach ($kriteria as $kriteria_item) : ?>
                                <th><?= $kriteria_item['deskripsi_kriteria'] ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin text-black dark:text-white">
                        <?php $no = 1; ?>
                        <?php foreach ($alternatif as $alternatif_item) : ?>
                            <tr>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $no++; ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $alternatif_item['nama_alternatif'] ?></td>
                                <?php foreach ($kriteria as $kriteria_item) : ?>
                                    <td class="border border-gray-200 dark:border-gray-700">
                                        <?php
                                        $nilai_alternatif = $data_pencocokan[$alternatif_item['id_alternatif']][$kriteria_item['id_kriteria']]['nilai'] ?? '-';
                                        $max_value = $maxValues[$kriteria_item['deskripsi_kriteria']];
                                        $min_value = $minValues[$kriteria_item['deskripsi_kriteria']];
                                        if ($kriteria_item['deskripsi_kriteria'] === 'Harga') {
                                            echo $nilai_alternatif != '-' ? $min_value . '/' . $nilai_alternatif : '-';
                                        } else {
                                            // Jika kriteria bukan "Harga", tampilkan seperti sebelumnya
                                            echo $nilai_alternatif != '-' ? $nilai_alternatif . '/' . $max_value : '-';
                                        }
                                        ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class=" mb-3">
        <button class="mb-4 flex items-center text-gray-600 dark:text-gray-300 hover:text-rose-600 dark:hover:text-rose-600 border-b hover:border-rose-600 focus:border-rose-600 focus:text-rose-600 text-sm font-medium py-2 px-3  w-full text-left transition-all ease-in border-solid cursor-pointer group" data-collapse-target="3">
                <span>3. Normalization result</span>
            </button>
            <div data-collapse="3" class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <table id="thirdTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <?php
                            $kriteriaModel = new \App\Models\CriteriaModel();
                            $kriteria = $kriteriaModel->findAll();
                            foreach ($kriteria as $kriteria_item) : ?>
                                <th><?= $kriteria_item['deskripsi_kriteria'] ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin text-black dark:text-white">
                        <?php $no = 1; ?>
                        <?php foreach ($alternatif as $alternatif_item) : ?>
                            <tr>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $no++; ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $alternatif_item['nama_alternatif'] ?></td>
                                <?php foreach ($kriteria as $kriteria_item) : ?>
                                    <td class="border border-gray-200 dark:border-gray-700">
                                        <?php
                                        $nilai_alternatif = $data_pencocokan[$alternatif_item['id_alternatif']][$kriteria_item['id_kriteria']]['nilai'] ?? '-';
                                        $max_value = $maxValues[$kriteria_item['deskripsi_kriteria']];
                                        $min_value = $minValues[$kriteria_item['deskripsi_kriteria']];
                                        if ($kriteria_item['deskripsi_kriteria'] === 'Harga') {
                                            $hasil_pembagian = $nilai_alternatif != '-' ? $min_value / $nilai_alternatif : '-';
                                            if ($hasil_pembagian != '-') {
                                                if ($hasil_pembagian == 1) {
                                                    $normalisasi = '1';
                                                } else {
                                                    $normalisasi = rtrim(number_format($hasil_pembagian, 4), '0');
                                                    if ($normalisasi == '.') {
                                                        $normalisasi = '0';
                                                    }
                                                }
                                            } else {
                                                $normalisasi = '-';
                                            }
                                            echo $normalisasi;
                                        } else {
                                            $hasil_pembagian = $nilai_alternatif != '-' ? $nilai_alternatif / $max_value : '-';
                                            if ($hasil_pembagian != '-') {
                                                if ($hasil_pembagian == 1) {
                                                    $normalisasi = '1';
                                                } else {
                                                    $normalisasi = rtrim(number_format($hasil_pembagian, 4), '0');
                                                    if ($normalisasi == '.') {
                                                        $normalisasi = '0';
                                                    }
                                                }
                                            } else {
                                                $normalisasi = '-';
                                            }
                                            echo $normalisasi;
                                        }
                                        ?>
                                    </td>

                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class=" mb-3">
                <button class="mb-4 flex items-center text-gray-600 dark:text-gray-300 hover:text-rose-600 dark:hover:text-rose-600 border-b hover:border-rose-600 focus:border-rose-600 focus:text-rose-600 text-sm font-medium py-2 px-3  w-full text-left transition-all ease-in border-solid cursor-pointer group" data-collapse-target="4" >
                    <span>4. Calculating Preference values</span>
                </button>
                <div class="h-0 overflow-hidden transition-all duration-300 ease-in-out" data-collapse="4">
                    <table id="fourthTable" class="display nowrap" style="width:100%">
                        <thead class="text-sm font-bold">
                            <tr>
                                <th class="w-12">No.</th>
                                <th>Alternative</th>
                                <?php
                                $kriteriaModel = new \App\Models\CriteriaModel();
                                $kriteria = $kriteriaModel->findAll();
                                foreach ($kriteria as $kriteria_item) : ?>
                                    <th><?= $kriteria_item['deskripsi_kriteria'] ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-thin text-black dark:text-white">
                            <?php $no = 1; ?>
                            <?php foreach ($alternatif as $alternatif_item) : ?>
                                <tr>
                                    <td class="border border-gray-200 dark:border-gray-700"><?= $no++; ?></td>
                                    <td class="border border-gray-200 dark:border-gray-700"><?= $alternatif_item['nama_alternatif'] ?></td>
                                    <?php foreach ($kriteria as $kriteria_item) : ?>
                                        <td class="border border-gray-200 dark:border-gray-700">
                                            <?php
                                            $nilai_alternatif = $data_pencocokan[$alternatif_item['id_alternatif']][$kriteria_item['id_kriteria']]['nilai'] ?? '-';
                                            $max_value = $maxValues[$kriteria_item['deskripsi_kriteria']];
                                            $min_value = $minValues[$kriteria_item['deskripsi_kriteria']];
                                            if ($kriteria_item['deskripsi_kriteria'] === 'Harga') {
                                                $hasil_pembagian = $nilai_alternatif != '-' ? $min_value / $nilai_alternatif : '-';
                                            } else {
                                                $hasil_pembagian = $nilai_alternatif != '-' ? $nilai_alternatif / $max_value : '-';
                                            }
                                            if ($hasil_pembagian != '-') {
                                                if ($hasil_pembagian == 1) {
                                                    $normalisasi = '1';
                                                } else {
                                                    $normalisasi = round($hasil_pembagian, 3);
                                                }
                                                // Mengambil bobot kriteria dari array $bobotKriteria
                                                $bobot_kriteria = $bobot_kriteria_pencocokan[$kriteria_item['id_kriteria']];
                                                // Mengalikan normalisasi dengan bobot kriteria
                                                echo $normalisasi . ' x ' . $bobot_kriteria['bobot_kriteria'];;
                                            } else {
                                                $hasil_normalisasi = '-';
                                                echo $hasil_normalisasi;
                                            }
                                            ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot class="text-sm font-bold">
                            <tr>
                                <td colspan="2" class="border border-gray-200 dark:border-gray-700">Criteria Weight</td>
                                <?php foreach ($bobotkriteria as $bobot) : ?>
                                    <td><?= $bobot ?></td>
                                <?php endforeach; ?>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class=" mb-3">
            <button class="mb-4 flex items-center text-gray-600 dark:text-gray-300 hover:text-rose-600 dark:hover:text-rose-600 border-b hover:border-rose-600 focus:border-rose-600 focus:text-rose-600 text-sm font-medium py-2 px-3  w-full text-left transition-all ease-in border-solid cursor-pointer group" data-collapse-target="5">
                <span>5. Preference result</span>
            </button>
            <div class="h-0 overflow-hidden transition-all duration-300 ease-in-out" data-collapse="5">
                <table id="fifthTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <?php
                            $kriteriaModel = new \App\Models\CriteriaModel();
                            $kriteria = $kriteriaModel->findAll();
                            foreach ($kriteria as $kriteria_item) : ?>
                                <th><?= $kriteria_item['deskripsi_kriteria'] ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin text-black dark:text-white">
                        <?php $no = 1; ?>
                        <?php foreach ($alternatif as $alternatif_item) : ?>
                            <tr>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $no++; ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $alternatif_item['nama_alternatif'] ?></td>
                                <?php foreach ($kriteria as $kriteria_item) : ?>
                                    <td class="border border-gray-200 dark:border-gray-700">
                                        <?php
                                        $nilai_alternatif = $data_pencocokan[$alternatif_item['id_alternatif']][$kriteria_item['id_kriteria']]['nilai'] ?? '-';
                                        $max_value = $maxValues[$kriteria_item['deskripsi_kriteria']];
                                        $min_value = $minValues[$kriteria_item['deskripsi_kriteria']];
                                        if ($kriteria_item['deskripsi_kriteria'] === 'Harga') {
                                            $hasil_pembagian = $nilai_alternatif != '-' ? $min_value / $nilai_alternatif : '-';
                                        } else {
                                            $hasil_pembagian = $nilai_alternatif != '-' ? $nilai_alternatif / $max_value : '-';
                                        }
                                        if ($hasil_pembagian != '-') {
                                            if ($hasil_pembagian == 1) {
                                                $normalisasi = '1';
                                            } else {
                                                $normalisasi = round($hasil_pembagian, 3);
                                            }
                                            // Mengambil bobot kriteria dari array $bobotKriteria
                                            $bobot_kriteria = $bobot_kriteria_pencocokan[$kriteria_item['id_kriteria']];
                                            // Mengalikan normalisasi dengan bobot kriteria
                                            $hasil = round($normalisasi * $bobot_kriteria['bobot_kriteria'], 3);
                                            echo $hasil;
                                        } else {
                                            $hasil_normalisasi = '-';
                                            echo $hasil_normalisasi;
                                        }
                                        ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class=" mb-3">
            <button class="mb-4 flex items-center text-gray-600 dark:text-gray-300 hover:text-rose-600 dark:hover:text-rose-600 border-b hover:border-rose-600 focus:border-rose-600 focus:text-rose-600 text-sm font-medium py-2 px-3  w-full text-left transition-all ease-in border-solid cursor-pointer group" data-collapse-target="6">
                <span>6. Calculating total Preference values</span>
            </button>
            <div class="h-0 overflow-hidden transition-all duration-300 ease-in-out" data-collapse="6">
                <table id="sixthTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <?php
                            $kriteriaModel = new \App\Models\CriteriaModel();
                            $kriteria = $kriteriaModel->findAll();
                            foreach ($kriteria as $kriteria_item) : ?>
                                <th><?= $kriteria_item['deskripsi_kriteria'] ?></th>
                            <?php endforeach; ?>
                            <th>Total Preference Value</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin text-black dark:text-white">
                        <?php $no = 1; ?>
                        <?php foreach ($alternatif as $alternatif_item) : ?>
                            <tr>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $no++; ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $alternatif_item['nama_alternatif'] ?></td>
                                <?php
                                $total_preference_value = 0;
                                ?>
                                <?php foreach ($kriteria as $kriteria_item) : ?>
                                    <td class="border border-gray-200 dark:border-gray-700">
                                        <?php
                                        $nilai_alternatif = $data_pencocokan[$alternatif_item['id_alternatif']][$kriteria_item['id_kriteria']]['nilai'] ?? '-';
                                        $max_value = $maxValues[$kriteria_item['deskripsi_kriteria']];
                                        $min_value = $minValues[$kriteria_item['deskripsi_kriteria']];
                                        if ($kriteria_item['deskripsi_kriteria'] === 'Harga') {
                                            $hasil_pembagian = $nilai_alternatif != '-' ? $min_value / $nilai_alternatif : '-';
                                        } else {
                                            $hasil_pembagian = $nilai_alternatif != '-' ? $nilai_alternatif / $max_value : '-';
                                        }
                                        if ($hasil_pembagian != '-') {
                                            if ($hasil_pembagian == 1) {
                                                $normalisasi = '1';
                                            } else {
                                                $normalisasi = round($hasil_pembagian, 3);
                                            }
                                            $bobot_kriteria = $bobot_kriteria_pencocokan[$kriteria_item['id_kriteria']];
                                            $hasil = round($normalisasi * $bobot_kriteria['bobot_kriteria'], 3);
                                            $total_preference_value += $hasil;
                                            echo $hasil;
                                        } else {
                                            $hasil_normalisasi = '-';
                                            echo $hasil_normalisasi;
                                        }
                                        ?>
                                    </td>
                                <?php endforeach; ?>
                                <td><?= round($total_preference_value, 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
        <div class=" mb-3">
            <button class="mb-4 flex items-center text-gray-600 dark:text-gray-300 hover:text-rose-600 dark:hover:text-rose-600 border-b hover:border-rose-600 focus:border-rose-600 focus:text-rose-600 text-sm font-medium py-2 px-3  w-full text-left transition-all ease-in border-solid cursor-pointer group" data-collapse-target="7">
                <span>7. Ranking</span>
            </button>
            <div class="h-0 overflow-hidden transition-all duration-300 ease-in-out" data-collapse="7">
                <table id="seventhTable" class="display nowrap" style="width:100%">
                    <thead class="text-sm font-bold">
                        <tr>
                            <th class="w-12">No.</th>
                            <th>Alternative</th>
                            <th>Total Preference Value</th>
                            <th>Ranking</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-thin text-black dark:text-white">
                        <?php
                        $total_preference_values = [];
                        $no = 1;
                        ?>
                        <?php foreach ($alternatif as $alternatif_item) : ?>
                            <?php
                            $total_preference_value = 0;
                            ?>
                            <?php foreach ($kriteria as $kriteria_item) : ?>
                                <?php
                                $nilai_alternatif = $data_pencocokan[$alternatif_item['id_alternatif']][$kriteria_item['id_kriteria']]['nilai'] ?? '-';
                                $max_value = $maxValues[$kriteria_item['deskripsi_kriteria']];
                                $min_value = $minValues[$kriteria_item['deskripsi_kriteria']];
                                if ($kriteria_item['deskripsi_kriteria'] === 'Harga') {
                                    $hasil_pembagian = $nilai_alternatif != '-' ? $min_value / $nilai_alternatif : '-';
                                } else {
                                    $hasil_pembagian = $nilai_alternatif != '-' ? $nilai_alternatif / $max_value : '-';
                                }
                                if ($hasil_pembagian != '-') {
                                    if ($hasil_pembagian == 1) {
                                        $normalisasi = '1';
                                    } else {
                                        $normalisasi = round($hasil_pembagian, 3);
                                    }
                                    $bobot_kriteria = $bobot_kriteria_pencocokan[$kriteria_item['id_kriteria']];
                                    $hasil = round($normalisasi * $bobot_kriteria['bobot_kriteria'], 3);
                                    $total_preference_value += $hasil;
                                } else {
                                    $hasil_normalisasi = '-';
                                }
                                ?>
                            <?php endforeach; ?>
                            <?php
                            $arrays = [
                                'id_alternatif' => $alternatif_item['id_alternatif'],
                                'nama_alternatif' => $alternatif_item['nama_alternatif'],
                                'total_value' => $total_preference_value
                            ];
                            $total_preference_values[] = $arrays;

                            ?>
                        <?php endforeach; ?>
                        <?php
                        // Mengurutkan array berdasarkan nilai total preferensi
                        usort($total_preference_values, function ($a, $b) {
                            return $b['total_value'] <=> $a['total_value'];
                        });

                        $ranking = 1; // Mulai dari peringkat 1
                        ?>
                        <?php $kalkulasiModel = new \App\Models\CalculationModel(); ?>
                        <?php $hasilModel = new \App\Models\ResultModel(); ?>
                        <?php
                        $totalHasil = $hasilModel->getLastNamaHasil();
                        $last_number = intval(preg_replace('/[^0-9]+/', '', $totalHasil));
                        $next_number = $last_number + 1;
                        $nama_hasil = "PO" . $next_number;
                        ?>
                        <?php foreach ($total_preference_values as $row) : ?>
                            <tr>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $no++; ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $row['nama_alternatif'] ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= round($row['total_value'], 2) ?></td>
                                <td class="border border-gray-200 dark:border-gray-700"><?= $ranking++ ?></td>
                            </tr>
                            <?php
                            if (isset($row['id_alternatif'], $row['total_value']) && $row['total_value'] != 0) {
                                $total = $kalkulasiModel->hasil_perhitungan($nama_hasil, $row['id_alternatif'], $row['total_value']);
                            } else {
                                // Lakukan tindakan alternatif jika salah satu variabel tidak terdefinisi atau total_value adalah 0
                                $total = null; // Atau tindakan lainnya sesuai kebutuhan
                            }
                            ?>
                            
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer'); ?>