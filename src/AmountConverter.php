<?php

namespace Spike;

use Spike\enums\Word;
use Spike\enums\Digit;

class AmountConverter
{
    /**
     * Processing all numbers.
     *
     * @param float $number
     * @return array
     */
    protected function convartAmountToWord(float $amount): array
    {
        $x = 0;
        $string = [];
        $amtHundred = null;
        $number = floor($amount);
        $countLength = strlen($number);

        while ($x < $countLength) {
            $getDivider = $x == 2 ? 10 : 100;
            $amount = floor($number % $getDivider);
            $num = floor($number / $getDivider);
            $x += $getDivider == 10 ? 1 : 2;

            if ($amount) {
                $addPlural = ($counter = count($string)) && $amount > 9 ? 's' : null;
                $amtHundred = $counter == 1 && $string[0] ? 'and ' : null;
                $string[] = $this->beforeDotAmount($amount, $counter, $addPlural, $amtHundred);

                return $string;
            }

            return $string[] = null;
        }
    }

    /**
     * 
     *
     * @param float $amount
     * @param int $counter
     * @param string|null $addPlural
     * @param string|null $amtHundred
     * @return string
     */
    private function beforeDotAmount(float $amount, int $counter, string|null $addPlural, string|null $amtHundred): string
    {
        return $amount < 21 ? Word::NUM_WORDS[$amount] . ' ' . Digit::ALL_DIGITS[$counter] . $addPlural . '' . $amtHundred : Word::NUM_WORDS[floor($amount / 10) * 10] . ' ' . Word::NUM_WORDS[$amount % 10] . ' ' . Digit::ALL_DIGITS[$counter] . $addPlural . ' ' . $amtHundred;
    }

    /**
     * This funtion retutn after dot numbers
     *
     * @param float $number
     * @return float
     */
    protected function afterDecimal(float $number): float
    {
        return round($number - (floor($number)), 2) * 100;
    }

    /**
     * After dot amount convart to word
     *
     * @param float $afterDecimal
     * @return string
     */
    protected function afterDotAmount(float $afterDecimal): string
    {
        return $afterDecimal > 0 ? 'And ' . (Word::NUM_WORDS[$afterDecimal / 10] . " " . Word::NUM_WORDS[$afterDecimal % 10]) . ' Paisa' : '';
    }
}