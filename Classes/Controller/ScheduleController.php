<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Controller;

use DateTime;
use DSKZPT\Openinghours\Exception\NoCurrentScheduleFoundException;
use DSKZPT\Openinghours\Provider\OpeningHoursProviderInterface;
use Spatie\OpeningHours\Exceptions\MaximumLimitExceeded;
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
        $openingHours = $this->openingHoursProvider->getCurrent();

        $dateString = $this->settings['dateString'];
        $referenceDate = new \DateTime($dateString);

        $exceptions = $openingHours->getExceptions($referenceDate);

        $this->view->assign('exceptions', $exceptions);
    }

    /**
     * @throws MaximumLimitExceeded
     * @throws NoCurrentScheduleFoundException
     */
    public function currentOpenRangeAction(): void
    {
        $now = new DateTime();

        $openingHours = $this->openingHoursProvider->getCurrent();

        if ($openingHours === null) {
            throw new NoCurrentScheduleFoundException();
        }

        $range = $openingHours->currentOpenRange($now);

        $this->view->assignMultiple([
            'range' => $range,
            'previousClose' => $openingHours->previousClose($now),
            'nextOpen' => $openingHours->nextOpen($now),
        ]);

        if ($range) {
            $this->view->assignMultiple([
                'rangeStart' => $range->start(),
                'rangeEnd' => $range->end(),
            ]);
        }
    }
}
