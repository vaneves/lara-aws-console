<?php 

namespace App\Services\Sqs;

use App\Services\Helpers\PaginateService;
use Aws\Sdk;
use Aws\Sqs\SqsClient;
use Illuminate\Pagination\LengthAwarePaginator;

class ListPaginatedQueueService
{
    private SqsClient $sqsClient;

    public function __construct(
        private readonly Sdk $aws,
        private readonly PaginateService $paginateService,
        private readonly FindQueueAttributesService $findQueueAttributesService,
    ) {
        $this->sqsClient = $aws->createClient('sqs');
    }

    public function execute(
        int $pageSize = 10, 
        ?string $searchByPrefix = null
    ): LengthAwarePaginator {  
        $queues = $this->listQueues($searchByPrefix);

        return $this->paginateService->execute(
            $queues, 
            $pageSize, 
            fn($item) => $this->findQueueAttributesService->execute($item)
        );
    }

    private function listQueues(?string $searchByPrefix = null): array 
    {
        $params = [];
        if ($searchByPrefix) {
            $params['QueueNamePrefix'] = $searchByPrefix;
        }
        $result = $this->sqsClient->listQueues($params);

        return $result->get('QueueUrls') ?? [];
    }
}