<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $item_name = null;

    #[ORM\Column]
    private ?float $item_price = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $item_description = null;

    #[ORM\Column(length: 50, nullable: false)]
    private ?string $item_colour = null;

    #[ORM\Column(length: 50, nullable: false)]
    private ?string $item_type = null;

    #[ORM\Column(length: 15, nullable: false)]
    private ?string $item_gender = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $item_brand = null;

    #[ORM\Column(length: 30, nullable: false)]
    private ?string $item_category = null;

    #[ORM\Column(length: 100, nullable: false)]
    private ?string $item_material = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $item_collection = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $item_image1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $item_image2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $item_image3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $item_image4 = null;

    #[ORM\OneToMany(mappedBy: 'item', targetEntity: Comment::class)]
    private Collection $comments;

//    #[ORM\OneToMany(mappedBy: 'item', targetEntity: Cart::class)]
//    private Collection $carts;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemName(): ?string
    {
        return $this->item_name;
    }

    public function setItemName(string $item_name): self
    {
        $this->item_name = $item_name;

        return $this;
    }

    public function getItemPrice(): ?float
    {
        return $this->item_price;
    }

    public function setItemPrice(float $item_price): self
    {
        $this->item_price = $item_price;

        return $this;
    }

    public function getItemDescription(): ?string
    {
        return $this->item_description;
    }

    public function setItemDescription(?string $item_description): self
    {
        $this->item_description = $item_description;

        return $this;
    }

    public function getItemColour(): ?string
    {
        return $this->item_colour;
    }

    public function setItemColour(?string $item_colour): self
    {
        $this->item_colour = $item_colour;

        return $this;
    }

    public function getItemType(): ?string
    {
        return $this->item_type;
    }

    public function setItemType(?string $item_type): self
    {
        $this->item_type = $item_type;

        return $this;
    }

    public function getItemGender(): ?string
    {
        return $this->item_gender;
    }

    public function setItemGender(?string $item_gender): self
    {
        $this->item_gender = $item_gender;

        return $this;
    }

    public function getItemBrand(): ?string
    {
        return $this->item_brand;
    }

    public function setItemBrand(?string $item_brand): self
    {
        $this->item_brand = $item_brand;

        return $this;
    }

    public function getItemCategory(): ?string
    {
        return $this->item_category;
    }

    public function setItemCategory(?string $item_category): self
    {
        $this->item_category = $item_category;

        return $this;
    }

    public function getItemMaterial(): ?string
    {
        return $this->item_material;
    }

    public function setItemMaterial(?string $item_material): self
    {
        $this->item_material = $item_material;

        return $this;
    }

    public function getItemCollection(): ?string
    {
        return $this->item_collection;
    }

    public function setItemCollection(?string $item_Collection): self
    {
        $this->item_collection = $item_Collection;

        return $this;
    }

    public function getItemImage1(): ?string
    {
        return $this->item_image1;
    }

    public function setItemImage1(?string $item_image1): self
    {
        $this->item_image1 = $item_image1;

        return $this;
    }

    public function getItemImage2(): ?string
    {
        return $this->item_image2;
    }

    public function setItemImage2(?string $item_image2): self
    {
        $this->item_image2 = $item_image2;

        return $this;
    }

    public function getItemImage3(): ?string
    {
        return $this->item_image3;
    }

    public function setItemImage3(?string $item_image3): self
    {
        $this->item_image3 = $item_image3;

        return $this;
    }

    public function getItemImage4(): ?string
    {
        return $this->item_image4;
    }

    public function setItemImage4(?string $item_image4): self
    {
        $this->item_image4 = $item_image4;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setItem($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getItem() === $this) {
                $comment->setItem(null);
            }
        }

        return $this;
    }


//    /**
//     * @return Collection<int, Cart>
//     */
//    public function getCarts(): Collection
//    {
//        return $this->carts;
//    }
//
//    public function addCart(Cart $cart): self
//    {
//        if (!$this->carts->contains($cart)) {
//            $this->carts->add($cart);
//            $cart->setItem($this);
//        }
//
//        return $this;
//    }
//
//    public function removeCart(Cart $cart): self
//    {
//        if ($this->carts->removeElement($cart)) {
//            // set the owning side to null (unless already changed)
//            if ($cart->getItem() === $this) {
//                $cart->setItem(null);
//            }
//        }
//
//        return $this;
//    }

}
