<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRatingRepository")
 */
class PlayerRating
{
    /**
     * @var UuidInterface
     *
     * @ORM\Id()
     * @ORM\Column(type="uuid", unique=true)
     */
    private $playerId;

    /**
     * @ORM\Id()
     * @var UuidInterface
     * @ORM\Column(type="uuid")
     */
    private $categoryId;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $rating;

    /**
     * @var int
     * @ORM\Column(type="smallint")
     */
    private $ratingType;

    /**
     * @var string
     * @ORM\Column(type="string", length=64)
     */
    private $rank;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $tournamentCount;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $matchCount;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $matchWinCount;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="date", nullable=true)
     */
    private $lastActivity;

    /**
     * @return UuidInterface
     */
    public function getPlayerId(): UuidInterface
    {
        return $this->playerId;
    }

    public function getCategoryId(): UuidInterface
    {
        return $this->categoryId;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getRatingType(): int
    {
        return $this->ratingType;
    }

    public function setRatingType(int $type): self
    {
        $this->ratingType = $type;

        return $this;
    }

    public function getRank(): ?string
    {
        return $this->rank;
    }

    public function setRank(?string $rank): self
    {
        $this->rank = $rank;

        return $this;
    }

    public function getTournamentCount(): int
    {
        return $this->tournamentCount;
    }

    public function setTournamentCount(int $tournamentCount): self
    {
        $this->tournamentCount = $tournamentCount;

        return $this;
    }

    public function getMatchCount(): int
    {
        return $this->matchCount;
    }

    public function setMatchCount(int $matchCount): self
    {
        $this->matchCount = $matchCount;

        return $this;
    }

    public function getMatchWinCount(): int
    {
        return $this->matchWinCount;
    }

    public function setMatchWinCount(int $matchWinCount): self
    {
        $this->matchWinCount = $matchWinCount;

        return $this;
    }

    public function getLastActivity(): ?\DateTimeInterface
    {
        return $this->lastActivity;
    }

    public function setLastActivity(?\DateTimeInterface $lastActivity): self
    {
        $this->lastActivity = $lastActivity;

        return $this;
    }
}
