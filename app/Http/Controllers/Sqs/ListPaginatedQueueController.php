<?php

namespace App\Http\Controllers\Sqs;

use App\Http\Controllers\Controller;
use App\Services\Sqs\ListPaginatedQueueService;
use Illuminate\Http\Request;

class ListPaginatedQueueController extends Controller
{
    public function __construct(
        private readonly ListPaginatedQueueService $service,
    ) {}

    public function view(Request $request)
    {
        $pageSize = $request->get('pageSize', 20);
        $search = $request->get('search');
        $queues = $this->service->execute(
            $pageSize,
            $search,
        );
        
        return view('sqs.list', [
            'queues' => $queues
        ]);
    }
}
