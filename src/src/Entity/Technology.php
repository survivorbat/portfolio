<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Timestampable\Traits\TimestampableEntity;

class Technology
{
    use IdTrait;
    use TimestampableEntity;

    /** @var string $name */
    protected $name = '';
    /** @var Image|null $image */
    protected $image;
    /** @var StatusUpdate[]|Collection $statusUpdates */
    protected $statusUpdates;
    /** @var ExperienceTopic[]|Collection */
    protected $experienceTopics;
    /** @var Project[]|Collection */
    protected $projects;

    /**
     * Technology constructor.
     */
    public function __construct()
    {
        $this->statusUpdates = new ArrayCollection();
        $this->experienceTopics = new ArrayCollection();
        $this->projects = new ArrayCollection();
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
     * @return Technology
     */
    public function setName(string $name): Technology
    {
        $this->name = $name;
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
     * @return Technology
     */
    public function setImage(?Image $image): Technology
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return StatusUpdate[]|Collection
     */
    public function getStatusUpdates(): array
    {
        return $this->statusUpdates->toArray();
    }

    /**
     * @param StatusUpdate[]|Collection $statusUpdates
     * @return Technology
     */
    public function setStatusUpdates(array $statusUpdates): Technology
    {
        $this->statusUpdates = $statusUpdates;
        return $this;
    }

    /**
     * @return ExperienceTopic[]|Collection
     */
    public function getExperienceTopics(): array
    {
        return $this->experienceTopics->toArray();
    }

    /**
     * @param ExperienceTopic[]|Collection $experienceTopics
     * @return Technology
     */
    public function setExperienceTopics(array $experienceTopics): Technology
    {
        $this->experienceTopics = $experienceTopics;
        return $this;
    }

    /**
     * @return Project[]|Collection
     */
    public function getProjects(): array
    {
        return $this->projects->toArray();
    }

    /**
     * @param Project[]|Collection $projects
     * @return Technology
     */
    public function setProjects(array $projects): Technology
    {
        $this->projects = $projects;
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
