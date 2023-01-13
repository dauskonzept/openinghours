<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Factory;

use DSKZPT\Openinghours\Domain\Model\Openingtime;
use DSKZPT\Openinghours\Domain\Model\Schedule;
use DSKZPT\Openinghours\Domain\OpeningHours;

class OpeningHoursFactory
{
    public function createFromSchedule(Schedule $schedule): OpeningHours
    {
        $regularWeek = [];

        foreach ($schedule->getAllDays() as $weekday => $openingTimes) {
            $regularWeek[$weekday] = [];

            /** @var Openingtime $openingTime */
            foreach ($openingTimes as $openingTime) {
                $regularWeek[$weekday][] = [
                    'hours' => $openingTime->__toString(),
                    'data' => $openingTime->getData(),
                ];
            }
        }

        $data = [];

        foreach ($regularWeek as $weekday => $dayData) {
            $data[$weekday] = $dayData;
        }

        $exceptions = [];

        foreach ($schedule->getExceptions() as $exception) {
            $date = $exception->getDate()->format('Y-m-d');

            if ($exception->isRecurring()) {
                $date = $exception->getDate()->format('m-d');
            }

            $exceptions[$date] = [
                'data' => $exception->getData(),
            ];

            foreach ($exception->getOpeninghours() as $openinghour) {
                $exceptions[$date][] = [
                    'hours' => sprintf('%s-%s', $openinghour->getStart()->format('H:i'), $openinghour->getEnd()->format('H:i')),
                    'data' => $openinghour->getData(),
                ];
            }
        }

        ksort($exceptions);
        $data['exceptions'] = $exceptions;

        return OpeningHours::create($data);
    }
}
