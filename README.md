<h1 align="center">spike/number-to-word</h1>

<p align="center">
    <strong>A PHP package for converting numbers to words.</strong>
</p>

A PHP package for converting numbers to words.

This package provides a convenient way to convert numeric values into their corresponding textual representation.

## Installation

The preferred method of installation is via [Composer][]. Run the following
command to install the package and add it as a requirement to your project's
`composer.json`:

```bash
composer require spike/number-to-word
```

## Upgrading to Version 1.0.0

## Uses

```bash
use Spike\AmountToWord;

$amountToWord = new AmountToWord();

echo $amountToWord->toWord(200.55);
```
