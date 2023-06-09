<?php

namespace Spike;

use Spike\enums\Word;
use Spike\enums\Digit;

class Transform
{
    /**
     * Processing all numbers.
     *
     * @param float $number
     * @return string
     */
    protected function numberToWord(float $number): string
    {
        $afterDecimal = $this->afterDecimal($number);
        // Check if there is any number after decimal
        $num = floor($number);
        $amtHundred = null;
        $countLength = strlen($num);
        $x = 0;
        $string = [];

        while ($x < $countLength) {
            $getDivider = $x == 2 ? 10 : 100;
            $amount = floor($num % $getDivider);
            $num = floor($num / $getDivider);
            $x += $getDivider == 10 ? 1 : 2;

            if ($amount) {
                $addPlural = ($counter = count($string)) && $amount > 9 ? 's' : null;
                $amtHundred = $counter == 1 && $string[0] ? ' and ' : null;
                $string[] = $this->beforeDotAmount($amount, $counter, $addPlural, $amtHundred);
            } else {
                $string[] = null;
            }
        }

        $implodeTo = implode('', array_reverse($string));
        $getPaise = $this->afterDotAmount($afterDecimal);
        return ($implodeTo ? $implodeTo . '' : '') . $getPaise;
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
        return $amount < 21 ? Word::NUM_WORDS[$amount] . ' ' . Digit::ALL_DIGITS[$counter] . $addPlural . ' ' . $amtHundred : Word::NUM_WORDS[floor($amount / 10) * 10] . ' ' . Word::NUM_WORDS[$amount % 10] . ' ' . Digit::ALL_DIGITS[$counter] . $addPlural . ' ' . $amtHundred;
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
