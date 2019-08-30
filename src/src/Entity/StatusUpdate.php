<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Timestampable\Traits\TimestampableEntity;

class StatusUpdate
{
    use IdTrait;
    use TimestampableEntity;

    /** @var string $title */
    protected $title = '';
    /** @var string $content */
    protected $content = '';
    /** @var Image|null $image */
    protected $image;
    /** @var Technology[]|Collection $technologies */
    protected $technologies;

    /**
     * StatusUpdate constructor.
     */
    public function __construct()
    {
        $this->technologies = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return StatusUpdate
     */
    public function setTitle(string $title): StatusUpdate
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return StatusUpdate
     */
    public function setContent(string $content): StatusUpdate
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return Image|null
     */
    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @param Image|null $image
     * @return StatusUpdate
     */
    public function setImage(?Image $image): StatusUpdate
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return Technology[]|Collection
     */
    public function getTechnologies(): array
    {
        return $this->technologies->toArray();
    }

    /**
     * @param Technology[]|Collection $technologies
     * @return StatusUpdate
     */
    public function setTechnologies(array $technologies): StatusUpdate
    {
        $this->technologies = $technologies;
        return $this;
    }
}
