<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Provider;

use DSKZPT\Openinghours\Domain\OpeningHours;

interface OpeningHoursProviderInterface
{
    public function getCurrent(): ?OpeningHours;

    /**
     * @param array{'tableMode': 'full'|'compact', 'displayMode': 'regular'|'real', 'dateString': string} $settings
     *
     * @return array<string, array{'days': string[], 'opening_hours': mixed[]}>
     */
    public function getWeekplan(OpeningHours $openingHours, array $settings): array;
}
