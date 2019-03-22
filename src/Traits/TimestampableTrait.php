<?php

namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/*
 * @ORM\HasLifecycleCallbacks
 */
trait TimestampableTrait
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     *
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     *
     * @Gedmo\Timestampable(on="update")
     */
    protected $updatedAt;

    public function getCreatedAt(): \DateTime
    {
        if ($this->createdAt) {
            return $this->createdAt;
        }
        else {
            return new \DateTime;
        }
    }

    
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        if ($this->updatedAt) {
           return $this->updatedAt;
       }
       else {
            return new \DateTime;
       }
    }

    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}