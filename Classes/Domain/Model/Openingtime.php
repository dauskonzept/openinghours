<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\Validate as Validate;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Openingtime extends AbstractEntity
{
    /**
     * @Validate("NotEmpty")
     */
    protected ?\DateTime $start = null;

    /**
     * @Validate("NotEmpty")
     */
    protected ?\DateTime $end = null;

    protected string $data = '';

    public function getStart(): ?\DateTime
    {
        return $this->start;
    }

    public function setStart(\DateTime $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): \DateTime
    {
        return $this->end;
    }

    public function setEnd(\DateTime $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function __toString(): string
    {
        $start = $this->getStart()->format('H:i') ?? '';
        $end = $this->getEnd()->format('H:i');

        return sprintf('%s-%s', $start, $end);
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
}
