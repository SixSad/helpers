<?php

namespace Sixsad\Helpers;

use App\Events\AbstractServiceEvent;
use Illuminate\Support\Facades\Log;

abstract class AbstractListener
{
    public function handle(AbstractEvent $event): void
    {
        Log::info(sprintf("Listener [%s] event [%s]", get_class($this), get_class($event)));
    }
}