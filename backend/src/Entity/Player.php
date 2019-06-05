<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 */
class Player
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
     * @var \DateTimeInterface
     * @ORM\Column(type="datetimetz")
     */
    private $createAt;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    private $updateAt;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    private $deleteAt;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $nick;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondName;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     * @ORM\Column(type="string", length=1)
     */
    private $sex;

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

    public function getNick(): ?string
    {
        return $this->nick;
    }

    public function setNick(string $nick): self
    {
        $this->nick = $nick;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getSecondName(): ?string
    {
        return $this->secondName;
    }

    public function setSecondName(?string $secondName): self
    {
        $this->secondName = $secondName;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(?string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }
}
