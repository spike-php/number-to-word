<?php

namespace Spike;

use Spike\enums\Digit;
use Spike\enums\Word;

class AmountToWord extends AmountConverter
{
    /**
     * Take amount to user
     *
     * @param float $amount
     * @return string
     */
    public function toWord(float $amount): string
    {
        $afterDecimal = $this->afterDecimal($amount);
        $string = $this->convartAmountToWord($amount);

        $implodeToTakas = implode('', array_reverse($string));
        $afterDotAmount = $this->afterDotAmount($afterDecimal);
        $result = ($implodeToTakas ? $implodeToTakas . '' : '') . $afterDotAmount;

        return $result;
    }
}
