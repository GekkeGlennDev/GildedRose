<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\quality\QualityCalculator;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private readonly array $items
    )
    {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $this->calculateSellIn($item);
            $this->calculateQuality($item);
        }
    }

    private function calculateQuality(Item $item): void
    {
        $calculator = CalculatebleItem::getQualityCalculator($item->name);

        if ($calculator instanceof QualityCalculator) {
            $calculator->calculate($item);
            return;
        }

        // decrease quality twice as fast when sellIn is passed.
        $decreaseAmount = $item->sellIn > 0 ? 1 : 2;
        $item->quality -= $decreaseAmount;

        if ($item->quality <= 0) {
            $item->quality = 0;
        }
    }

    private function calculateSellIn(Item $item): void
    {
        if ($item->name == CalculatebleItem::SULFURAS->value) {
            return;
        }

        $item->sellIn--;
    }
}
