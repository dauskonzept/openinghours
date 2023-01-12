<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM as ORM;
use TYPO3\CMS\Extbase\Annotation\Validate as Validate;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * This file is part of the "Openinghours" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Sven Petersen <sven_harders@gmx.de>
 */
class Schedule extends AbstractEntity
{
    /**
     * @Validate("NotEmpty")
     */
    protected string $title = '';

    /**
     * @Validate("NotEmpty")
     */
    protected ?\DateTime $startdate = null;

    /**
     * @Validate("NotEmpty")
     */
    protected ?\DateTime $enddate = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     *
     * @ORM\Cascade("remove")
     */
    protected ObjectStorage $monday;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     *
     * @ORM\Cascade("remove")
     */
    protected ObjectStorage $tuesday;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     *
     * @ORM\Cascade("remove")
     */
    protected ObjectStorage $wednesday;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     *
     * @ORM\Cascade("remove")
     */
    protected ObjectStorage $thursday;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     *
     * @ORM\Cascade("remove")
     */
    protected ObjectStorage $friday;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     *
     * @ORM\Cascade("remove")
     */
    protected ObjectStorage $saturday;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     *
     * @ORM\Cascade("remove")
     */
    protected ObjectStorage $sunday;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Exception>
     *
     * @ORM\Cascade("remove")
     */
    protected ObjectStorage $exceptions;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Override>
     *
     * @ORM\Cascade("remove")
     */
    protected ObjectStorage $overrides;

    public function __construct()
    {
        $this->monday = new ObjectStorage();
        $this->tuesday = new ObjectStorage();
        $this->wednesday = new ObjectStorage();
        $this->thursday = new ObjectStorage();
        $this->friday = new ObjectStorage();
        $this->saturday = new ObjectStorage();
        $this->sunday = new ObjectStorage();
        $this->exceptions = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getStartdate(): ?\DateTime
    {
        return $this->startdate;
    }

    public function setStartdate(\DateTime $startdate): self
    {
        $this->startdate = $startdate;

        return $this;
    }

    public function getEnddate(): ?\DateTime
    {
        return $this->enddate;
    }

    public function setEnddate(\DateTime $enddate): self
    {
        $this->enddate = $enddate;

        return $this;
    }

    public function addMonday(Openingtime $monday): self
    {
        $this->monday->attach($monday);

        return $this;
    }

    public function removeMonday(Openingtime $mondayToRemove): self
    {
        $this->monday->detach($mondayToRemove);

        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     */
    public function getMonday(): ObjectStorage
    {
        return $this->monday;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime> $monday
     */
    public function setMonday(ObjectStorage $monday): self
    {
        $this->monday = $monday;

        return $this;
    }

    /**
     * Adds a Openingtime
     *
     * @param Openingtime $tuesday
     */
    public function addTuesday(Openingtime $tuesday)
    {
        $this->tuesday->attach($tuesday);
    }

    /**
     * Removes a Openingtime
     *
     * @param Openingtime $tuesdayToRemove The Openingtime to be removed
     */
    public function removeTuesday(Openingtime $tuesdayToRemove)
    {
        $this->tuesday->detach($tuesdayToRemove);
    }

    /**
     * Returns the tuesday
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     */
    public function getTuesday()
    {
        return $this->tuesday;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime> $tuesday
     */
    public function setTuesday(ObjectStorage $tuesday): self
    {
        $this->tuesday = $tuesday;

        return $this;
    }

    public function addWednesday(Openingtime $wednesday): self
    {
        $this->wednesday->attach($wednesday);

        return $this;
    }

    public function removeWednesday(Openingtime $wednesdayToRemove): self
    {
        $this->wednesday->detach($wednesdayToRemove);

        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     */
    public function getWednesday(): ObjectStorage
    {
        return $this->wednesday;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime> $wednesday
     */
    public function setWednesday(ObjectStorage $wednesday): self
    {
        $this->wednesday = $wednesday;

        return $this;
    }

    public function addThursday(Openingtime $thursday): self
    {
        $this->thursday->attach($thursday);

        return $this;
    }

    /**
     * @param Openingtime $thursdayToRemove The Openingtime to be removed
     */
    public function removeThursday(Openingtime $thursdayToRemove): self
    {
        $this->thursday->detach($thursdayToRemove);

        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     */
    public function getThursday(): ObjectStorage
    {
        return $this->thursday;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime> $thursday
     */
    public function setThursday(ObjectStorage $thursday): self
    {
        $this->thursday = $thursday;

        return $this;
    }

    public function addFriday(Openingtime $saturday): self
    {
        $this->friday->attach($saturday);

        return $this;
    }

    public function removeFriday(Openingtime $fridayToRemove): self
    {
        $this->friday->detach($fridayToRemove);

        return $this;
    }

    public function getFriday(): ObjectStorage
    {
        return $this->friday;
    }

    public function setFriday(ObjectStorage $friday): self
    {
        $this->friday = $friday;

        return $this;
    }

    public function addSaturday(Openingtime $saturday): self
    {
        $this->saturday->attach($saturday);

        return $this;
    }

    public function removeSaturday(Openingtime $saturdayToRemove): self
    {
        $this->saturday->detach($saturdayToRemove);

        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     */
    public function getSaturday(): ObjectStorage
    {
        return $this->saturday;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime> $saturday
     */
    public function setSaturday(ObjectStorage $saturday): self
    {
        $this->saturday = $saturday;

        return $this;
    }

    public function addSunday(Openingtime $sunday): self
    {
        $this->sunday->attach($sunday);

        return $this;
    }

    public function removeSunday(Openingtime $sundayToRemove): self
    {
        $this->sunday->detach($sundayToRemove);

        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     */
    public function getSunday(): ObjectStorage
    {
        return $this->sunday;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime> $sunday
     */
    public function setSunday(ObjectStorage $sunday): self
    {
        $this->sunday = $sunday;

        return $this;
    }

    public function addExceptions(Exception $exception): self
    {
        $this->exceptions->attach($exception);

        return $this;
    }

    public function removeException(Exception $exception): self
    {
        $this->exceptions->detach($exception);

        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Exception>
     */
    public function getExceptions(): ObjectStorage
    {
        return $this->exceptions;
    }

    public function setExceptions(ObjectStorage $exceptions): self
    {
        $this->exceptions = $exceptions;

        return $this;
    }

    public function addOverride(Override $override): self
    {
        $this->overrides->attach($override);

        return $this;
    }

    public function removeOverride(Override $override): self
    {
        $this->overrides->detach($override);

        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Override>
     */
    public function getOverrides(): ObjectStorage
    {
        return $this->overrides;
    }

    public function setOverrides(ObjectStorage $overrides): self
    {
        $this->overrides = $overrides;

        return $this;
    }

    /**
     * @return array<string, ObjectStorage>
     */
    public function getAllDays(): array
    {
        return [
            'monday' => $this->getMonday(),
            'tuesday' => $this->getTuesday(),
            'wednesday' => $this->getWednesday(),
            'thursday' => $this->getThursday(),
            'friday' => $this->getFriday(),
            'saturday' => $this->getSaturday(),
            'sunday' => $this->getSunday(),
        ];
    }
}
