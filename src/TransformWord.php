<?php

namespace Spike;

use Spike\enums\Word;
use Spike\enums\Digit;

class TransformWord extends Transform
{
    /**
     * Take amount to user
     *
     * @param float $amount
     * @return string
     */
    public function toWord(float $number): string
    {
        $string = $this->numberToWord($number);

        return $string;
    }
}
