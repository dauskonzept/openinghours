<?php

declare(strict_types=1);

namespace DSKZPT\Openinghours\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Override extends AbstractEntity
{
    protected string $text = '';

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }
}
