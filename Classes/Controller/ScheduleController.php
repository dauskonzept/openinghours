<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Controller;

use DSKZPT\Openinghours\Exception\NoScheduleFoundException;
use DSKZPT\Openinghours\Provider\OpeningHoursProviderInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ScheduleController extends ActionController
{
    private OpeningHoursProviderInterface $openingHoursProvider;

    public function __construct(
        OpeningHoursProviderInterface $openingHoursProvider
    ) {
        $this->openingHoursProvider = $openingHoursProvider;
    }

    /**
     * @throws NoScheduleFoundException
     */
    public function tableAction(): void
    {
        $openingHours = $this->openingHoursProvider->getCurrent();

        if ($openingHours === null) {
            throw new NoScheduleFoundException();
        }

        /** @var array{tableMode: 'compact'|'full', displayMode: 'real'|'regular', dateString: string} $settings */
        $settings = $this->settings;

        $weekPlan = $this->openingHoursProvider->getWeekplan($openingHours, $settings);

        $this->view->assignMultiple([
            'weekPlan' => $weekPlan,
            'openinghours' => $openingHours,
        ]);
    }

    /**
     * @throws NoScheduleFoundException
     */
    public function exceptionsAction(): void
    {
        $dateString = $this->settings['dateString'];
        $referenceDate = new \DateTime($dateString);

        $openingHours = $this->openingHoursProvider->getCurrent();

        if ($openingHours === null) {
            throw new NoScheduleFoundException();
        }

        $exceptions = $openingHours->getExceptions($referenceDate);

        $this->view->assignMultiple([
            'openingHours' => $openingHours,
            'exceptions' => $exceptions,
        ]);
    }

    /**
     * @throws NoScheduleFoundException
     */
    public function currentOpenRangeAction(): void
    {
        $openingHours = $this->openingHoursProvider->getCurrent();

        if ($openingHours === null) {
            throw new NoScheduleFoundException();
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
