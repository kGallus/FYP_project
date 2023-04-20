<?php

namespace App\Entity;

use App\Repository\CartRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: CartRepository::class)]
class Cart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

//    #[ORM\Column(length: 255)]
//    private ?string $item_name = null;
//
//    #[ORM\Column(length: 255)]
//    private ?string $item_price = null;
//
//    #[ORM\Column(length: 255)]
//    private ?string $item_image = null;

    #[ORM\Column(length: 4)]
    private ?string $item_size = null;

    #[ORM\Column()]
    private ?int $item_id = null;

//    #[ORM\Column(type: Types::TEXT)]
//    private ?string $item = null;

    #[ORM\ManyToOne(inversedBy: 'carts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;
//    #[ORM\OneToMany(mappedBy: 'cart', targetEntity: User::class)]

    #[ORM\Column(type: Types::TEXT)]
    private ?string $creation_time = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $updated_time = null;


    public function getId(): ?int
    {
        return $this->id;
    }

//    public function getItemName(): ?string
//    {
//        return $this->item_name;
//    }
//
//    public function setItemName(string $item_name): self
//    {
//        $this->item_name = $item_name;
//
//        return $this;
//    }
//
//    public function getItemPrice(): ?float
//    {
//        return $this->item_price;
//    }
//
//    public function setItemPrice(string $item_price): self
//    {
//        $this->item_price = $item_price;
//
//        return $this;
//    }
//
//    public function getItemImage(): ?string
//    {
//        return $this->item_image;
//    }
//
//    public function setItemImage(string $item_image): self
//    {
//        $this->item_image = $item_image;
//
//        return $this;
//    }

    public function getItemSize(): ?string
    {
        return $this->item_size;
    }

    public function setItemSize(string $item_size): self
    {
        $this->item_size = $item_size;

        return $this;
    }

    public function getItemId(): ?int
    {
        return $this->item_id;
    }

    public function setItemId(string $item_id): self
    {
        $this->item_id = $item_id;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

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

