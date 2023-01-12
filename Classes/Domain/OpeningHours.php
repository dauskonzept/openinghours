<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Domain;

use DateTime;
use DSKZPT\Openinghours\Domain\Model\Override;
use DSKZPT\Openinghours\Domain\Model\Schedule;
use Spatie\OpeningHours\Day;
use Spatie\OpeningHours\OpeningHours as BaseOpeningHours;
use Spatie\OpeningHours\OpeningHoursForDay;

/**
 * Wrapper for Spatie\OpeningHours\OpeningHours.
 * Wraps its methods to make them callable in Fluid Templates.
 */
class OpeningHours extends BaseOpeningHours
{
    private ?Schedule $schedule = null;

    /**
     * @return Day[]
     */
    public function getForWeek(): array
    {
        return $this->forWeek();
    }

    /**
     * @see forWeekCombined()
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
     * @see forWeekConsecutiveDays
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

    /**
     * @return mixed[]
     *
     * @throws \Exception
     */
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

    public function getSchedule(): ?Schedule
    {
        return $this->schedule;
    }

    public function getCurrentOpenRange()
    {
        return $this->currentOpenRange(new \DateTime());
    }

    public function getPreviousClose()
    {
        return $this->previousClose(new \DateTime());
    }

    public function getNextOpen()
    {
        return $this->nextOpen(new \DateTime());
    }

    public function getNextClose()
    {
        return $this->nextClose(new \DateTime());
    }

    public function setSchedule(?Schedule $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function hasActiveOverride(): bool
    {
        $overrides = $this->schedule->getOverrides();

        return $overrides->count() > 0;
    }

    public function getOverride(): ?Override
    {
        if ($this->hasActiveOverride() === false) {
            return null;
        }

        return $this->schedule->getOverrides()[0];
    }
}
