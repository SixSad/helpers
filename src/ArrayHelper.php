<?php

namespace Sixsad\Helpers;

use Exception;

class ArrayHelper
{
    public static function arrayFilter(array $array, array $filterKeys, string $message = null): array
    {
        $filterKeys[] = 'id';

        foreach ($array as $key => $value) {
            if (!in_array($key, $filterKeys)) {
                throw new Exception($message ?? "Invalid attribute $key", 405);
            }
        }
        return $array;
    }

}
