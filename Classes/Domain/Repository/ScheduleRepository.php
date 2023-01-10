<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Domain\Repository;

use DSKZPT\Openinghours\Domain\Model\Schedule;
use TYPO3\CMS\Extbase\Persistence\Repository;

class ScheduleRepository extends Repository
{
    public function findCurrent(): ?Schedule
    {
        $query = $this->createQuery();

        $now = (new \DateTime())->getTimestamp();

        $query->matching(
            $query->logicalAnd(
                [
                    $query->lessThanOrEqual('startdate', $now),
                    $query->greaterThanOrEqual('enddate', $now),
                ]
            )
        );

        return $query->execute()->getFirst();
    }
}
