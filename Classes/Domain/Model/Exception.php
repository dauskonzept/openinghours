<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Domain\Model;

use DateTime;
use TYPO3\CMS\Extbase\Annotation\ORM as ORM;
use TYPO3\CMS\Extbase\Annotation\Validate as Validate;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Exception extends AbstractEntity
{
    /**
     * @Validate("NotEmpty")
     */
    protected ?DateTime $date = null;

    protected bool $recurring = false;

    protected string $data = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Openingtime>
     *
     * @ORM\Cascade("remove")
     */
    protected ObjectStorage $openinghours;

    public function __construct()
    {
        $this->openinghours = new ObjectStorage();
    }

    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    public function setDate(?DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function addOpeninghours(Openingtime $openingTime): self
    {
        $this->openinghours->attach($openingTime);

        return $this;
    }

    public function removeOpeninghours(Openingtime $openingTimeToRemove): self
    {
        $this->openinghours->detach($openingTimeToRemove);

        return $this;
    }

    /**
     * @return ObjectStorage<Openingtime>
     */
    public function getOpeninghours(): ObjectStorage
    {
        return $this->openinghours;
    }

    /**
     * @param ObjectStorage<Openingtime> $openinghours
     */
    public function setOpeninghours(ObjectStorage $openinghours): self
    {
        $this->openinghours = $openinghours;

        return $this;
    }

    public function isRecurring(): bool
    {
        return $this->recurring;
    }

    public function setRecurring(bool $recurring): self
    {
        $this->recurring = $recurring;

        return $this;
    }
}
