<?php

namespace Sixsad\Helpers;

class GenerateNumbers
{
    public static function generate(int $count): string
    {
        $numbers = "";

        for ($i = 0; $i < $count; $i++) {
            $numbers .= rand(0, 9);
        }

        return $numbers;
    }
}
