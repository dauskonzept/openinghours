<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Provider;

use DSKZPT\Openinghours\Domain\OpeningHours;
use DSKZPT\Openinghours\Domain\Repository\ScheduleRepository;
use DSKZPT\Openinghours\Factory\OpeningHoursFactory;

class OpeningHoursProvider implements OpeningHoursProviderInterface
{
    private ScheduleRepository $scheduleRepository;

    private OpeningHoursFactory $openingHoursFactory;

    public function __construct(
        ScheduleRepository $scheduleRepository,
        OpeningHoursFactory $openingHoursFactory
    ) {
        $this->scheduleRepository = $scheduleRepository;
        $this->openingHoursFactory = $openingHoursFactory;
    }

    public function getCurrent(): ?OpeningHours
    {
        $currentSchedule = $this->scheduleRepository->findCurrent();

        if ($currentSchedule === null) {
            throw new \InvalidArgumentException('Es gibt keinen Olan!!!! @todo');
        }

        $openingHours = $this->openingHoursFactory->createFromSchedule($currentSchedule);
        $openingHours->setSchedule($currentSchedule);

        return $openingHours;
    }
}
