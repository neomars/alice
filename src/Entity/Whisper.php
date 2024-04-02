<?php

namespace App\Entity;

// use App\Repository\WhisperRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 */
class Whisper
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
    private $audioName;

    /**
     * @ORM\Column(nullable="true")
     */
    private ?int $audioSize = null;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Task", inversedBy="whispers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $task;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Language", inversedBy="whispers")
     */
    private $language;

    /**     
     * @ORM\ManyToOne(targetEntity="App\Entity\Model", inversedBy="whispers")
     */
    private $model;

    // /**
    //  * @ORM\ManyToOne(targetEntity="App\Entity\Outputformat", inversedBy="whispers")
    //  * @ORM\JoinColumn(nullable=false)
    //  */
    // private $outputformat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Locuteur", inversedBy="whispers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $locuteur;

     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Highlightwords", inversedBy="whispers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $highlightwords;

    
    public function __construct()
    {
        $this->updatedAt = new \DateTime( 'now' );
        // (string) $this->language = "fr";
    }

    public function __toString() 
    {
    	return (string) $this->audioName; 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setAudioFile(?File $audioFile = null): void
    {
        $this->audioFile = $audioFile;

        if (null !== $audioFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getAudioFile(): ?File
    {
        return $this->audioFile;
    }

    public function setAudioName(?string $audioName): void
    {
        $this->audioName = $audioName;
    }

    public function getAudioName(): ?string
    {
        return $this->audioName;
    }

    public function setAudioSize(?int $audioSize): void
    {
        $this->audioSize = $audioSize;
    }

    public function getAudioSize(): ?int
    {
        return $this->audioSize;
    }

    public function getTask(): ?Task
    {
        return $this->task;
    }

    public function setTask(?Task $task): self
    {
        $this->task = $task;

        return $this;
    }

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): static
    {
        $this->model = $model;

        return $this;
    }

    // public function getOutputformat(): ?Outputformat
    // {
    //     return $this->outputformat;
    // }

    // public function setOutputformat(?Outputformat $outputformat): self
    // {
    //     $this->outputformat = $outputformat;

    //     return $this;
    // }    

    public function getLocuteur(): ?Locuteur
    {
        return $this->locuteur;
    }

    public function setLocuteur(?Locuteur $locuteur): self
    {
        $this->locuteur = $locuteur;

        return $this;
    }    

    public function getHighlightwords(): ?Highlightwords
    {
        return $this->highlightwords;
    }

    public function setHighlightwords(?Highlightwords $highlightwords): self
    {
        $this->highlightwords = $highlightwords;

        return $this;
    }   
}
