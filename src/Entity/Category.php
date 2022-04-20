<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string')]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: 'Category', mappedBy: "parent_id")]
    #[ORM\Column(type: 'integer')]
    private ?int $children_id = null;

    #[ORM\ManyToOne(targetEntity: 'Category', inversedBy: "children_id")]
    #[ORM\JoinColumn(name: 'parent_id', referencedColumnName: 'id')]
    #[ORM\Column(type: 'integer')]
    private ?int $parent_id = null;

    #[ORM\Column(type: 'integer')]
    private ?int $count = null;

    #[ORM\Column(type: 'binary')]
    private ?bool $show = null;

    #[ORM\Column(type: 'string')]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getChildrenId(): ?int
    {
        return $this->children_id;
    }

    /**
     * @param int|null $children_id
     */
    public function setChildrenId(?int $children_id): void
    {
        $this->children_id = $children_id;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parent_id;
    }

    /**
     * @param int|null $parent_id
     */
    public function setParentId(?int $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @param int|null $count
     */
    public function setCount(?int $count): void
    {
        $this->count = $count;
    }

    /**
     * @return bool|null
     */
    public function getShow(): ?bool
    {
        return $this->show;
    }

    /**
     * @param bool|null $show
     */
    public function setShow(?bool $show): void
    {
        $this->show = $show;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

}
