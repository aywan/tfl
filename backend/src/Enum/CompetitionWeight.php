<?php

namespace App\Enum;

final class CompetitionWeight
{
    public const LOCAL = 'local';
    public const STAGE = 'stage';
    public const FINALS = 'finals';
    public const ITSF = 'itsf';

    private static $weights = [
        self::LOCAL => 0.75,
        self::STAGE => 1.0,
        self::FINALS => 1.0,
        self::ITSF => 1.25,
    ];

    public static function getCatList(): array
    {
        return [
            'Другие совервнования' => self::getWeight(self::LOCAL),
        ];
    }

    public static function getWeight(string $weight): float
    {
        return self::$weights[$weight] ?? 0.0;
    }
}