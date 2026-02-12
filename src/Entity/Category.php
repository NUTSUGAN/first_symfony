<?php


namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity]
class Category
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column(type: 'integer')]
private ?int $id = null;


#[ORM\Column(type: 'string', length: 255)]
private ?string $name = null;


#[ORM\OneToMany(mappedBy: 'category', targetEntity: \App\Entity\Post::class, orphanRemoval: true)]
private Collection $posts;


#[ORM\ManyToOne]
#[ORM\JoinColumn(nullable: false)]
private ?User $createdBy = null;

public function getCreatedBy(): ?User
{
    return $this->createdBy;
}

public function setCreatedBy(?User $createdBy): self
{
    $this->createdBy = $createdBy;
    return $this;
}

    
public function __construct() { $this->posts = new ArrayCollection(); } public function getId(): ?int { return $this->id; } public function getName(): ?string {
return $this->name;
}


public function setName(string $name): self
{
$this->name = $name;


return $this;
}


/** @return Collection|Post[] */
public function getPosts(): Collection
{
return $this->posts;
}


public function __toString(): string
{
return (string) $this->name;
}
}