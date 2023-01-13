<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Provider;

use DSKZPT\Openinghours\Domain\Model\Schedule;
use DSKZPT\Openinghours\Domain\OpeningHours;
use DSKZPT\Openinghours\Domain\Repository\ScheduleRepository;
use DSKZPT\Openinghours\Exception\NoScheduleFoundException;
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

    /**
     * @return OpeningHours
     *
     * @throws NoScheduleFoundException
     */
    public function getCurrent(): OpeningHours
    {
        /** @phpstan-ignore-next-line */
        $currentSchedule = $this->scheduleRepository->findAll()->getFirst();

        if (!$currentSchedule instanceof Schedule) {
            throw new NoScheduleFoundException();
        }

        return $this->openingHoursFactory->createFromSchedule($currentSchedule);
    }

    /**
     * @param array{'tableMode': 'full'|'compact', 'displayMode': 'regular'|'real', 'dateString': string} $settings
     *
     * @return  mixed[]
     */
    public function getWeekplan(OpeningHours $openingHours, array $settings): array
    {
        $tableMode = $settings['tableMode'];
        $displayMode = $settings['displayMode'];
        $dateString = $settings['dateString'];

        if ($tableMode === 'full') {
            switch ($displayMode) {
                case 'regular':
                    return $openingHours->getForWeek();
                case 'real':
                    return $openingHours->getForWeekWithExceptions($dateString);
            }
        }

        if ($tableMode === 'compact') {
            switch ($displayMode) {
                case 'regular':
                    return $openingHours->getForWeekCombined();
                case 'real':
                    return $openingHours->getForWeekCombinedWithException($dateString);
            }
        }
    }
}
