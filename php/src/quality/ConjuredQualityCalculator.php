<?php

declare(strict_types=1);

namespace GildedRose\quality;

use GildedRose\Item;

class ConjuredQualityCalculator implements QualityCalculator
{
    function calculate(Item $item): void
    {
        $item->quality -= 2;

        if ($item->quality <= 0) {
            $item->quality = 0;
        }
    }
}