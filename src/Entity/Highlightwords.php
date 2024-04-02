<?php

namespace App\Entity;

use App\Repository\HighlightwordsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Highlightwords
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $valeur;

    public function __toString() 
    {
    	return (string) $this->valeur; 
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(string $valeur): static
    {
        $this->valeur = $valeur;

        return $this;
    }
}
