<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Domain\Repository;

/**
 * This file is part of the "Openinghours" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Sven Petersen <sven_harders@gmx.de>
 */

/**
 * The repository for Openingtimes
 */
class OpeningtimeRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];
}
