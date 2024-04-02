<?php

namespace App\Entity;

use App\Repository\ResumeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Resume
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $prompt;

    public function __toString() 
    {
    	return (string) $this->prompt; 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrompt(): ?string
    {
        return $this->prompt;
    }

    public function setPrompt(string $prompt): self
    {
        $this->prompt = $prompt;

        return $this;
    }
}
