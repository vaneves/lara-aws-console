<?php 

namespace App\Services\Sqs;

use App\Entities\Queue;
use Aws\Sdk;
use Aws\Sqs\SqsClient;

class FindQueueAttributesService
{
    private SqsClient $sqsClient;

    public function __construct(
        private readonly Sdk $aws,
    ) {
        $this->sqsClient = $aws->createClient('sqs');
    }

    public function execute(string $queueUrl): Queue
    {
        $result = $this->sqsClient->getQueueAttributes([
            'QueueUrl' => $queueUrl,
            'AttributeNames' => ['All'],
        ]);
        $attributes = $result->get('Attributes');
        
        return Queue::fromArrayAttributes(
            $queueUrl, 
            $attributes,
        );
    }
}