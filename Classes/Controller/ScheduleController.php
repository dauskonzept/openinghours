<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Controller;

use DSKZPT\Openinghours\Exception\NoScheduleFoundException;
use DSKZPT\Openinghours\Provider\OpeningHoursProviderInterface;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ScheduleController extends ActionController
{
    public function __construct(
        private OpeningHoursProviderInterface $openingHoursProvider,
    ) {
    }

    /**
     * @throws NoScheduleFoundException
     */
    public function tableAction(): ResponseInterface
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

        return $this->htmlResponse();
    }

    /**
     * @throws NoScheduleFoundException
     */
    public function exceptionsAction(): ResponseInterface
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

        return $this->htmlResponse();
    }

    /**
     * @throws NoScheduleFoundException
     */
    public function currentOpenRangeAction(): ResponseInterface
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

        return $this->htmlResponse();
    }
}
