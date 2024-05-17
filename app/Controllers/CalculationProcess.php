<?php

namespace App\Controllers;

class CalculationProcess extends BaseController
{
    protected $alternatifModel;
    protected $kriteriaModel;
    protected $penialianModel;
    protected $kalkulasiModel;

    public function __construct()
    {
        $this->alternatifModel = new \App\Models\AlternativeModel();
        $this->kriteriaModel = new \App\Models\CriteriaModel();
        $this->penialianModel = new \App\Models\AssessmentModel();
        $this->kalkulasiModel = new \App\Models\CalculationModel();
    }

    public function index()
    {
        $alternatif = $this->alternatifModel->findAll();
        $kriteria = $this->kriteriaModel->findAll();
        $penilaian = $this->penialianModel->findAll();

        $data_pencocokan = [];
        foreach ($alternatif as $alternatif_item) {
            foreach ($kriteria as $kriteria_item) {
                $data_pencocokan[$alternatif_item['id_alternatif']][$kriteria_item['id_kriteria']] = $this->penialianModel->get_Penilaian($alternatif_item['id_alternatif'], $kriteria_item['id_kriteria']);
            }
        }

        $maxValues = $this->kalkulasiModel->getMaxValuesByCriteria();
        $minValues = $this->kalkulasiModel->getMinValuesByCriteria();
        $bobot_kriteria = $this->kalkulasiModel->getBobotKriteria();

        $bobot_kriteria_pencocokan = [];
        foreach ($kriteria as $kriteria_item) {
            $bobot_kriteria_pencocokan[$kriteria_item['id_kriteria']] = $this->kriteriaModel->getKriteria($kriteria_item['id_kriteria']);
        }

        $data = [
            'alternatif' => $alternatif,
            'kriteria' => $kriteria,
            'penilaian' => $penilaian,
            'data_pencocokan' => $data_pencocokan,
            'maxValues' => $maxValues,
            'minValues' => $minValues,
            'bobotkriteria' => $bobot_kriteria,
            'bobot_kriteria_pencocokan' => $bobot_kriteria_pencocokan
        ];

        return view('page/CalculationProcess/index', $data);
    }
}
