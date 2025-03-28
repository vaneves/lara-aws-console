<?php

namespace App\Entities;

enum ServiceStatusEnum: string
{
    case Available = 'available';
    case Running = 'running';
    case Disabled = 'disabled';
}