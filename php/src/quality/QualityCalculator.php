<?php

declare(strict_types=1);

namespace GildedRose\quality;

use GildedRose\Item;

interface QualityCalculator
{
    CONST MAX_ITEM_QUALITY = 50;

    function calculate(Item $item): void;
}