<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Provider;

use DSKZPT\Openinghours\Domain\OpeningHours;

interface OpeningHoursProviderInterface
{
    public function getCurrent(): ?OpeningHours;
}
