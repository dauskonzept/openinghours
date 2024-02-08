<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Domain;

use DateTime;
use DateTimeInterface;
use DSKZPT\Openinghours\Domain\Model\Override;
use DSKZPT\Openinghours\Domain\Model\Schedule;
use Exception;
use Spatie\OpeningHours\Day;
use Spatie\OpeningHours\Exceptions\MaximumLimitExceeded;
use Spatie\OpeningHours\OpeningHours as BaseOpeningHours;
use Spatie\OpeningHours\OpeningHoursForDay;
use Spatie\OpeningHours\TimeRange;

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
     * @return mixed[]
     */
    public function getForWeekCombinedWithException(string $startDay = 'this monday'): array
    {
        $equalDays = [];
        $allOpeningHours = [];
        $date = (new \DateTime($startDay));

        for ($i = 1; $i <= 7; $i++) {
            $allOpeningHours[strtolower($date->format('l'))] = $this->forDate($date);
            $date = $date->modify('+ 1 day');
        }

        $uniqueOpeningHours = array_unique($allOpeningHours);
        $nonUniqueOpeningHours = $allOpeningHours;

        foreach ($uniqueOpeningHours as $day => $value) {
            $equalDays[$day] = ['days' => [$day], 'opening_hours' => $value];
            unset($nonUniqueOpeningHours[$day]);
        }

        foreach ($uniqueOpeningHours as $uniqueDay => $uniqueValue) {
            foreach ($nonUniqueOpeningHours as $nonUniqueDay => $nonUniqueValue) {
                if ((string)$uniqueValue === (string)$nonUniqueValue) {
                    $equalDays[$uniqueDay]['days'][] = $nonUniqueDay;
                }
            }
        }

        return $equalDays;
    }

    /**
     * @return array<string, array<'days'|'opening_hours', mixed[]>>
     *
     * @see forWeekCombined()
     */
    public function getForWeekCombined(): array
    {
        return $this->forWeekCombined();
    }

    /**
     * @return OpeningHoursForDay[]
     *
     * @throws Exception
     */
    public function getExceptions(DateTimeInterface $exceptionsSince = null): array
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
     * @return array<string, array<'days'|'opening_hours', mixed[]>>
     *
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
     * @throws Exception
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

    /**
     * @return TimeRange|null
     */
    public function getCurrentOpenRange()
    {
        return $this->currentOpenRange(new \DateTime());
    }

    /**
     * @return DateTimeInterface
     * @throws MaximumLimitExceeded
     */
    public function getPreviousClose()
    {
        return $this->previousClose(new \DateTime());
    }

    /**
     * @return DateTimeInterface
     * @throws MaximumLimitExceeded
     */
    public function getNextOpen()
    {
        return $this->nextOpen(new \DateTime());
    }

    /**
     * @return DateTimeInterface
     * @throws MaximumLimitExceeded
     */
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
        if ($this->schedule === null) {
            return false;
        }

        $overrides = $this->schedule->getOverrides();

        return $overrides->count() > 0;
    }

    public function getOverride(): ?Override
    {
        if ($this->hasActiveOverride() === false || $this->schedule === null) {
            return null;
        }

        return $this->schedule->getOverrides()->toArray()[0];
    }
}
