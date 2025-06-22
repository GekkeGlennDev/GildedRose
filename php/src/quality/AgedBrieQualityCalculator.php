<?php

declare(strict_types=1);

namespace GildedRose\quality;

use GildedRose\Item;

class AgedBrieQualityCalculator implements QualityCalculator
{
    function calculate(Item $item): void
    {
        if ($item->quality < self::MAX_ITEM_QUALITY) {
            $item->quality++;
        }
    }
}