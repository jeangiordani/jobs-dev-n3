<?php

namespace App\Repositories;

use App\Helper\ArrayCheck;
use App\Models\Report;
use App\Services\ReportService;
use Illuminate\Support\Facades\Validator;


class ReportRepository
{
    protected $model;
    protected $service;

    public function __construct(Report $model, ReportService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    public function getAllReports()
    {
        $rawResult = $this->service->getAllReports();

        $result = [];

        $reports = $this->findAllReports();

        $met = new ArrayCheck();


        for ($x = 0; $x < sizeof($rawResult); $x++) {

            if ($met->in_multiarray($rawResult[$x]['id'], $reports, 'external_id') != true) {
                $this->model->create([
                    'external_id' => $rawResult[$x]['id'],
                    'title' => $rawResult[$x]['title'],
                    'url' => $rawResult[$x]['url'],
                    'summary' => $rawResult[$x]['summary'],
                ]);
            }
        }

        $reports = $this->findAllReports();

        return response()->json([
            'status' => 'success',
            'data' => $reports
        ]);
    }

    protected function findAllReports()
    {
        return $this->model->all()->toArray();
    }
}
