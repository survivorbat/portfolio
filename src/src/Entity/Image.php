<?php

namespace App\Entity;

use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Image
{
    use IdTrait;
    use TimestampableEntity;

    /** @var string|null $mimeType */
    protected $mimeType = '';
    /** @var string $filename */
    protected $filename = '';
    /** @var string $filePath */
    protected $filePath = '';
    /** @var string $publicPath */
    protected $publicPath = '';
    /** @var \DateTime $imageUpdated */
    protected $imageUpdated;
    /** @var UploadedFile|null $resource */
    protected $resource;
    /** @var Image|null $project */
    protected $project;
    /** @var StatusUpdate|null $statusUpdate */
    protected $statusUpdate;
    /** @var Technology|null $technology */
    protected $technology;

    /**
     * Image constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->imageUpdated = new \DateTime();
    }

    /**
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    /**
     * @param string|null $mimeType
     * @return Image
     */
    public function setMimeType(?string $mimeType): Image
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     * @return Image
     */
    public function setFilename(string $filename): Image
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     * @return Image
     */
    public function setFilePath(string $filePath): Image
    {
        $this->filePath = $filePath;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublicPath(): string
    {
        return $this->publicPath;
    }

    /**
     * @param string $publicPath
     * @return Image
     */
    public function setPublicPath(string $publicPath): Image
    {
        $this->publicPath = $publicPath;
        return $this;
    }

    /**
     * @return UploadedFile|null
     */
    public function getResource(): ?UploadedFile
    {
        return $this->resource;
    }

    /**
     * @return \DateTime
     */
    public function getImageUpdated(): \DateTime
    {
        return $this->imageUpdated;
    }

    /**
     * @param UploadedFile|null $resource
     * @return Image
     * @throws \Exception
     */
    public function setResource(?UploadedFile $resource): Image
    {
        if ($resource) {
            $this->imageUpdated = new \DateTime();
        }

        $this->resource = $resource;
        return $this;
    }

    /**
     * @return Image|null
     */
    public function getProject(): ?Project
    {
        return $this->project;
    }

    /**
     * @param Project|null $project
     * @return Image
     */
    public function setProject(?Project $project): Image
    {
        $this->project = $project;
        return $this;
    }

    /**
     * @return StatusUpdate|null
     */
    public function getStatusUpdate(): ?StatusUpdate
    {
        return $this->statusUpdate;
    }

    /**
     * @param StatusUpdate|null $statusUpdate
     * @return Image
     */
    public function setStatusUpdate(?StatusUpdate $statusUpdate): Image
    {
        $this->statusUpdate = $statusUpdate;
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
     * @return Image
     */
    public function setTechnology(?Technology $technology): Image
    {
        $this->technology = $technology;
        return $this;
    }
}
