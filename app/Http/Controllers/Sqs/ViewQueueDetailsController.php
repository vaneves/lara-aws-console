<?php

namespace App\Http\Controllers\Sqs;

use App\Http\Controllers\Controller;
use App\Services\Sqs\FindQueueAttributesService;

class ViewQueueDetailsController extends Controller
{
    public function __construct(
        private readonly FindQueueAttributesService $service,
        private readonly BreadcrumbStackForSqs $breadcrumbStack,
    ) {}

    public function view(string $queueName)
    {
        $this->breadcrumbStack->add($queueName);
        $queue = $this->service->execute($queueName);

        return view('sqs.view', [
            'queue' => $queue,
            'breadcrumbStack' => $this->breadcrumbStack,
        ]);
    }
}
