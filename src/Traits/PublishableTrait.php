<?php

namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;

trait PublishableTrait
{
	
    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished = 0;

    /**
     * @ORM\Column(type="datetime", nullable=true)
    */
    private $publishedAt;

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }


    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }
}