<?php 

namespace App\Http\Controllers;

use App\Services\Service\ListServicesService;

class HomeController extends Controller
{
    public function __construct(
        private readonly ListServicesService $service,
        private readonly BreadcrumbStackForHome $breadcrumbStack,
    ) {}

    public function view()
    {
        $services = $this->service->execute();

        return view('home', [
            'services' => $services,
            'breadcrumbStack' => $this->breadcrumbStack,
        ]);
    }
}