<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SetRepository")
 */
class Set
{
    /**
     * @var UuidInterface
     *
     * @ORM\Id()
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $createAt;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $updateAt;

    /**
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    private $deleteAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $scoreA;

    /**
     * @ORM\Column(type="integer")
     */
    private $scoreB;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $state;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getDeleteAt(): ?\DateTimeInterface
    {
        return $this->deleteAt;
    }

    public function setDeleteAt(?\DateTimeInterface $deleteAt): self
    {
        $this->deleteAt = $deleteAt;

        return $this;
    }

    public function getScoreA(): ?int
    {
        return $this->scoreA;
    }

    public function setScoreA(int $scoreA): self
    {
        $this->scoreA = $scoreA;

        return $this;
    }

    public function getScoreB(): ?int
    {
        return $this->scoreB;
    }

    public function setScoreB(int $scoreB): self
    {
        $this->scoreB = $scoreB;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }
}
