<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Timestampable\Traits\TimestampableEntity;

class Project
{
    use IdTrait;
    use TimestampableEntity;

    /** @var string $name */
    protected $name = '';
    /** @var string $description */
    protected $description = '';
    /** @var Image[]|Collection $images */
    protected $images;
    /** @var string|null $link */
    protected $link;
    /** @var int|null $position */
    protected $position;
    /** @var Technology[]|Collection */
    protected $technologies;

    /**
     * Project constructor.
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->technologies = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Project
     */
    public function setName(string $name): Project
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Project
     */
    public function setDescription(string $description): Project
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Image[]|Collection
     */
    public function getImages(): array
    {
        return $this->images->toArray();
    }

    /**
     * @param Image $image
     * @return Project
     */
    public function addImage(Image $image): Project
    {
        $image->setProject($this);
        $this->images->add($image);
        return $this;
    }

    /**
     * @param Image $image
     * @return Project
     */
    public function removeImage(Image $image): Project
    {
        $this->images->remove($image);
        $image->setProject(null);
        return $this;
    }

    /**
     * @param Image[]|Collection $images
     * @return Project
     */
    public function setImages(array $images): Project
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     * @return Project
     */
    public function setLink(?string $link): Project
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int|null $position
     * @return Project
     */
    public function setPosition(?int $position): Project
    {
        $this->position = $position;
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
     * @return Project
     */
    public function setTechnologies(array $technologies): Project
    {
        $this->technologies = $technologies;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
