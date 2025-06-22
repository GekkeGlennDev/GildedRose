<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\quality\AgedBrieQualityCalculator;
use GildedRose\quality\BackstagePassQualityCalculator;
use GildedRose\quality\ConjuredQualityCalculator;
use GildedRose\quality\QualityCalculator;
use GildedRose\quality\SulfurasQualityCalculator;

enum CalculatebleItem: string
{
    case AGED_BRIE = 'Aged Brie';
    case BACKSTAGE_PASS = 'Backstage passes to a TAFKAL80ETC concert';
    case SULFURAS = 'Sulfuras, Hand of Ragnaros';
    case CONJURED = 'Conjured';

    public static function getQualityCalculator(string $name): ?QualityCalculator
    {
        return match ($name) {
            self::AGED_BRIE->value => new AgedBrieQualityCalculator(),
            self::BACKSTAGE_PASS->value => new BackstagePassQualityCalculator(),
            self::SULFURAS->value => new SulfurasQualityCalculator(),
            self::CONJURED->value => new ConjuredQualityCalculator(),
            default => null
        };
    }
}
