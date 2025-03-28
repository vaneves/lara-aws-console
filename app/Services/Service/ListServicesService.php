<?php 

namespace App\Services\Service;

use App\Entities\Service;
use App\Entities\ServiceStatusEnum;
use Illuminate\Http\Client\Factory as Http;
use Illuminate\Http\Client\Response;

class ListServicesService
{
    public function __construct(
        private readonly Http $http,
    ) {}

    public function execute(): array
    {
        $response = $this->http->get("http://localstack:4566/_localstack/health");

        return $this->mountServiceList($response);
    }

    private function mountServiceList(Response $response): array 
    {
        $serviceNames = [
            'sqs' => 'SQS', 
            'sns' => 'SNS', 
            's3' => 'S3',
        ];
        $services = [];
        foreach ($serviceNames as $slug => $name) {
            $status = $response->json("services.{$slug}", 'disabled');
            $services[] = new Service(
                $name,
                $slug,
                ServiceStatusEnum::from($status),
            );
        }

        return $services;
    }
}