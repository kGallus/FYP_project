<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $authorName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(length: 1)]
    private ?string $stars = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?item $item = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $creation_time = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $updated_time = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthorName(): ?string
    {
        return $this->authorName;
    }

    public function setAuthorName(string $authorName): self
    {
        $this->authorName = $authorName;

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

    public function getStars(): ?string
    {
        return $this->stars;
    }

    public function setStars(string $stars): self
    {
        $this->stars = $stars;

        return $this;
    }

    public function getItem(): ?item
    {
        return $this->item;
    }

    public function setItem(Item $item): self
    {
        $this->item = $item;

        return $this;
    }


    public function getCreationTime(): ?string
    {
        return $this->creation_time;
    }

    public function setCreationTime(string $creation_time): self
    {
        $this->creation_time = $creation_time;

        return $this;
    }

    public function getUpdatedTime(): ?string
    {
        return $this->updated_time;
    }

    public function setUpdatedTime(string $updated_time): self
    {
        $this->updated_time = $updated_time;

        return $this;
    }
}

