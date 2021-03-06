<?php

declare(strict_types=1);

namespace Fop\Core\Utils;

use DateTimeInterface;
use Nette\Utils\DateTime;

final class DateStaticUtils
{
    public static function getDiffFromTodayInDays(?DateTimeInterface $dateTime): ?int
    {
        if ($dateTime === null) {
            return null;
        }

        $dateInterval = $dateTime->diff(new DateTime('now'));
        if ($dateInterval->invert === 0) {
            return (int) - $dateInterval->days;
        }

        return (int) $dateInterval->days;
    }
}
