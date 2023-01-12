<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Controller;

use DSKZPT\Openinghours\Exception\NoCurrentScheduleFoundException;
use DSKZPT\Openinghours\Provider\OpeningHoursProviderInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ScheduleController extends ActionController
{
    private OpeningHoursProviderInterface $openingHoursProvider;

    public function __construct(OpeningHoursProviderInterface $openingHoursProvider)
    {
        $this->openingHoursProvider = $openingHoursProvider;
    }

    public function tableAction(): void
    {
        $openingHours = $this->openingHoursProvider->getCurrent();

        $schedule = $openingHours->forWeek();

        if ($this->settings['displayMode'] === 'real') {
            $dateString = $this->settings['dateString'];
            $schedule = $openingHours->getForWeekWithExceptions($dateString);
        }

        $this->view->assignMultiple([
            'schedule' => $schedule,
            'openinghours' => $openingHours,
        ]);
    }

    public function exceptionsAction(): void
    {
        $dateString = $this->settings['dateString'];
        $referenceDate = new \DateTime($dateString);

        $openingHours = $this->openingHoursProvider->getCurrent();
        $exceptions = $openingHours->getExceptions($referenceDate);

        $this->view->assignMultiple([
            'openinghours' => $openingHours,
            'exceptions' => $exceptions
        ]);
    }

    /**
     * @throws NoCurrentScheduleFoundException
     */
    public function currentOpenRangeAction(): void
    {
        $openingHours = $this->openingHoursProvider->getCurrent();

        if ($openingHours === null) {
            throw new NoCurrentScheduleFoundException();
        }

        $range = $openingHours->getCurrentOpenRange();

        $this->view->assignMultiple([
            'openingHours' => $openingHours,
            'range' => $range,
        ]);

        if ($range) {
            $this->view->assignMultiple([
                'rangeStart' => $range->start(),
                'rangeEnd' => $range->end(),
            ]);
        }
    }
}
