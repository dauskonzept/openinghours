<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class OpeningtimeRepository extends Repository
{
    /**
     * @var array<non-empty-string, 'ASC'|'DESC'>
     */
    protected $defaultOrderings = ['sorting' => QueryInterface::ORDER_ASCENDING];
}
