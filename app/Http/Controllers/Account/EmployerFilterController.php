<?php


namespace App\Http\Controllers\Account;


use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployerFilterRequest;
use App\Service\EmployerFilter\EmployerFilterService;

class EmployerFilterController extends Controller
{
    private $employerFilterService;

    public function __construct(EmployerFilterService $employerFilterService)
    {
        $this->employerFilterService = $employerFilterService;
    }

    public function store(CreateEmployerFilterRequest $request)
    {
        $this->employerFilterService->store($request->all());
    }

}
