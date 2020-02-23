<?php


namespace App\Http\Controllers\EmployerLandingPage;


use App\Http\Requests\AdvisoryPackageRequest;
use App\Http\Requests\LandingPageAdvisoryRequest;
use App\Service\EmployerLandingPage\EmployerLandingPageService;


class EmployerLandingPageControllers
{

    private $employerLandingPageService;

    public function __construct(EmployerLandingPageService $employerLandingPageService)
    {
        $this->employerLandingPageService = $employerLandingPageService;
    }

    public function creatAdvisoryForLandingPage(LandingPageAdvisoryRequest $request)
    {
        $rawData = $request->input();
        $this->employerLandingPageService->insertAdvisoryLandingPage($rawData);
        return response()->json('success',200);

    }

    public function creatAdvisoryForPackage1(AdvisoryPackageRequest $request)
    {
        $rawData = $request->input();
        $this->employerLandingPageService->insertAdvisoryPackage1($rawData);
        return view('landing-page.page.goidangtin',['success' =>'Đăng ký thành công']);
    }

    public function creatAdvisoryForPackage2(AdvisoryPackageRequest $request)
    {
        $rawData = $request->input();
        $this->employerLandingPageService->insertAdvisoryPackage1($rawData);
        return view('landing-page.page.goiloccv',['success' =>'Đăng ký thành công']);
    }

    public function creatAdvisoryForPackage3(AdvisoryPackageRequest $request)
    {
        $rawData = $request->input();
        $this->employerLandingPageService->insertAdvisoryPackage1($rawData);
        return view('landing-page.page.goicombo',['success' =>'Đăng ký thành công']);
    }

    public function creatAdvisoryForPackage4(AdvisoryPackageRequest $request)
    {
        $rawData = $request->input();
        $this->employerLandingPageService->insertAdvisoryPackage1($rawData);
        return view('landing-page.page.goiungvientdpv',['success' =>'Đăng ký thành công']);
    }

    public function creatAdvisoryForPackage5(AdvisoryPackageRequest $request)
    {
        $rawData = $request->input();
        $this->employerLandingPageService->insertAdvisoryPackage1($rawData);
        return view('landing-page.page.goinhansutd',['success' =>'Đăng ký thành công']);
    }

    public function creatAdvisoryForPackage6(AdvisoryPackageRequest $request)
    {
        $rawData = $request->input();
        $this->employerLandingPageService->insertAdvisoryPackage1($rawData);
        return view('landing-page.page.goidaotao',['success' =>'Đăng ký thành công']);
    }
}
