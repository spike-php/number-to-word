<?php

use Spike\TransformWord;

require __DIR__.'/../vendor/autoload.php';

$transform = new TransformWord();

$number = 12520255.2740;

echo $transform->toWord(522525.25) . PHP_EOL;
