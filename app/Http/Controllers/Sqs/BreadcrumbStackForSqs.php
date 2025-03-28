<?php

namespace App\Http\Controllers\Sqs;

use App\Http\Controllers\BreadcrumbStackForHome;

class BreadcrumbStackForSqs extends BreadcrumbStackForHome
{
    public function __construct()
    {
        parent::__construct();
        $this->add(
            label: 'SQS',
            link: route('sqs')
        );
    }
}
