<?php

declare(strict_types=1);

namespace GildedRose\quality;

use GildedRose\Item;

class BackstagePassQualityCalculator implements QualityCalculator
{
    function calculate(Item $item): void
    {
        // When sellIn date is passed, set quality to 0;
        if ($item->sellIn <= 0) {
            $item->quality = 0;
            return;
        }

        $quality = $item->quality + 1;

        // When sellIn date is within 10 days, add an extra quality point.
        if ($item->sellIn <= 10) {
            $quality++;
        }

        // When sellIn date is within 5 days, add another extra quality point.
        if ($item->sellIn <= 5) {
            $quality++;
        }

        if ($item->quality > self::MAX_ITEM_QUALITY) {
            $quality = 50;
        }

        $item->quality = $quality;
    }
}