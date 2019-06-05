<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 * @ORM\Table(
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(columns={"player_a", "player_b"})
 *     },
 *     indexes={
 *          @ORM\Index(columns={"player_a"}),
 *          @ORM\Index(columns={"player_b"}),
 *     }
 * )
 */
class Team
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
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    private $updateAt;

    /**
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    private $deleteAt;

    /**
     * @ORM\Column(type="uuid")
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumn(name="id")
     */
    private $playerA;

    /**
     * @ORM\Column(type="uuid")
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumn(name="id")
     */
    private $playerB;

    /**
     * @ORM\Column(type="integer")
     */
    private $tournamentCount;

    /**
     * @ORM\Column(type="integer")
     */
    private $matchCount;

    /**
     * @ORM\Column(type="integer")
     */
    private $matchWinCount;

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

    public function setUpdateAt(?\DateTimeInterface $updateAt): self
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

    public function getPlayerA()
    {
        return $this->playerA;
    }

    public function setPlayerA($playerA): self
    {
        $this->playerA = $playerA;

        return $this;
    }

    public function getPlayerB()
    {
        return $this->playerB;
    }

    public function setPlayerB($playerB): self
    {
        $this->playerB = $playerB;

        return $this;
    }

    public function getTournamentCount(): ?int
    {
        return $this->tournamentCount;
    }

    public function setTournamentCount(int $tournamentCount): self
    {
        $this->tournamentCount = $tournamentCount;

        return $this;
    }

    public function getMatchCount(): ?int
    {
        return $this->matchCount;
    }

    public function setMatchCount(int $matchCount): self
    {
        $this->matchCount = $matchCount;

        return $this;
    }

    public function getMatchWinCount(): ?int
    {
        return $this->matchWinCount;
    }

    public function setMatchWinCount(int $matchWinCount): self
    {
        $this->matchWinCount = $matchWinCount;

        return $this;
    }
}
