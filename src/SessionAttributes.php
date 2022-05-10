<?php

namespace Sixsad\Helpers;

use Egal\Core\Session\Session;

class SessionAttributes
{
    public static function getAttributes(): array
    {
        return Session::getActionMessage()->getParameters()['attributes'] ?? [];
    }
}
