<?php

// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('isbn', [$this, 'formatIsbn']),
        ];
    }

    public function formatIsbn($isbn, $separator = '-'): string
    {
        $isbn = str_split($isbn);
        $numArray = array_filter($isbn, fn($c) => intval($c));

        $firstIsbnPart = $numArray[0];
        $secondIsbnPart = join('', array_slice($numArray, 1, 5));
        $thirdIsbnPart = join('', array_slice($numArray, 6));

        return join($separator, [$firstIsbnPart, $secondIsbnPart, $thirdIsbnPart]);
    }
}

