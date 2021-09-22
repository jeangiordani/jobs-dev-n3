<?php

namespace App\Http\Controllers;

use App\Models\Report;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Resources\ReportResource;
use App\Repositories\ReportRepository;

class ReportController extends Controller
{
    protected $repository;


    public function __construct(ReportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listReports(Request $request)
    {
        return $this->repository->getAllReports();
    }

    // /**
    //  * @param Request $request
    //  * @return \Illuminate\Http\JsonResponse|object
    //  */
    // public function createReport(Request $request)
    // {
    //     $report = Report::create([
    //         'external_id' => $request->post('external_id'),
    //         'title' => $request->post('title'),
    //         'url' => $request->post('url'),
    //         'summary' => $request->post('summary')
    //     ]);

    //     return (new ReportResource($report))
    //         ->response()
    //         ->setStatusCode(201);
    // }

    // /**
    //  * TODO: Implement it
    //  *
    //  * @param $reportId
    //  */
    // public function deleteReport($reportId)
    // {
    //     // Implementar esse endpoint.
    // }
}
