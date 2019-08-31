<?php

namespace App\Entity;

use Gedmo\Timestampable\Traits\TimestampableEntity;

class ExperienceTopic
{
    use IdTrait;
    use TimestampableEntity;

    /** @var \DateTime $since */
    protected $since;
    /** @var string $explanation */
    protected $explanation = '';
    /** @var Technology|null $technology */
    protected $technology;

    /**
     * ExperienceTopic constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->since = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getSince(): \DateTime
    {
        return $this->since;
    }

    /**
     * @param \DateTime $since
     * @return ExperienceTopic
     */
    public function setSince(\DateTime $since): ExperienceTopic
    {
        $this->since = $since;
        return $this;
    }

    /**
     * @return string
     */
    public function getExplanation(): string
    {
        return $this->explanation;
    }

    /**
     * @param string $explanation
     * @return ExperienceTopic
     */
    public function setExplanation(string $explanation): ExperienceTopic
    {
        $this->explanation = $explanation;
        return $this;
    }

    /**
     * @return Technology|null
     */
    public function getTechnology(): ?Technology
    {
        return $this->technology;
    }

    /**
     * @param Technology|null $technology
     * @return ExperienceTopic
     */
    public function setTechnology(?Technology $technology): ExperienceTopic
    {
        $this->technology = $technology;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->explanation;
    }
}
