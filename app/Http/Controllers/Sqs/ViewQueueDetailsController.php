<?php

namespace App\Http\Controllers\Sqs;

use App\Http\Controllers\Controller;
use App\Services\Sqs\FindQueueAttributesService;

class ViewQueueDetailsController extends Controller
{
    public function __construct(
        private readonly FindQueueAttributesService $service,
    ) {}

    public function view(string $queueName)
    {
        $queue = $this->service->execute($queueName);

        // dd($queue);
        return view('sqs.view', [
            'queue' => $queue,
        ]);
    }
}
