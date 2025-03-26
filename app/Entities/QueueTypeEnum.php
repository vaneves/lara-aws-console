<?php

namespace App\Entities;

enum QueueTypeEnum: string
{
    case Standard = 'Standard';
    case Fifo = 'Fifo';
}