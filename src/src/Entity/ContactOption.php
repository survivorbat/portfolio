<?php

namespace App\Entity;

use Gedmo\Timestampable\Traits\TimestampableEntity;

class ContactOption
{
    use IdTrait;
    use TimestampableEntity;

    /** @var string $label */
    protected $label = '';
    /** @var string $value */
    protected $value = '';

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return ContactOption
     */
    public function setLabel(string $label): ContactOption
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return ContactOption
     */
    public function setValue(string $value): ContactOption
    {
        $this->value = $value;
        return $this;
    }
}
