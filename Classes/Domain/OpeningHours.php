<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Domain;

use DateTime;
use Spatie\OpeningHours\Day;
use Spatie\OpeningHours\OpeningHours as BaseOpeningHours;
use Spatie\OpeningHours\OpeningHoursForDay;

/**
 * Wrapper for Spatie\OpeningHours\OpeningHours.
 * Wrappes its methods to make them callable in Fluid Templates.
 */
class OpeningHours extends BaseOpeningHours
{
    /**
     * @return Day[]
     */
    public function getForWeek(): array
    {
        return $this->forWeek();
    }

    /**
     * @inheritDoc
     */
    public function getForWeekCombined(): array
    {
        return $this->forWeekCombined();
    }

    /**
     * @return OpeningHoursForDay[]
     *
     * @throws \Exception
     */
    public function getExceptions(\DateTimeInterface $exceptionsSince = null): array
    {
        if ($exceptionsSince === null) {
            return $this->exceptions();
        }

        $return = [];

        foreach ($this->exceptions as $date => $exception) {
            $isFutureException = new DateTime($date) > $exceptionsSince;

            if ($isFutureException) {
                $return[$date] = $exception;
            }
        }

        return $return;
    }

    /**
     * @inheritDoc
     */
    public function getForWeekConsecutiveDays(): array
    {
        return $this->forWeekConsecutiveDays();
    }

    /**
     * @return OpeningHoursForDay[]
     */
    public function getUpcomingExceptions(): array
    {
        return $this->getExceptions(new \DateTime());
    }

    public function getForWeekWithExceptions(string $startDay = 'next monday'): array
    {
        $return = [];
        $date = (new \DateTime($startDay));

        for ($i = 1; $i <= 7; $i++) {
            $return[strtolower($date->format('l'))] = $this->forDate($date);
            $date = $date->modify('+ 1 day');
        }

        return $return;
    }
}
