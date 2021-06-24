<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
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
    private $userName;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\ManyToMany(targetEntity=Rentable::class, mappedBy="comments")
     */
    private $rentables;

    public function __construct()
    {
        $this->rentables = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Collection|Rentable[]
     */
    public function getRentables(): Collection
    {
        return $this->rentables;
    }

    public function addRentable(Rentable $rentable): self
    {
        if (!$this->rentables->contains($rentable)) {
            $this->rentables[] = $rentable;
            $rentable->addComment($this);
        }

        return $this;
    }

    public function removeRentable(Rentable $rentable): self
    {
        if ($this->rentables->removeElement($rentable)) {
            $rentable->removeComment($this);
        }

        return $this;
    }
}
