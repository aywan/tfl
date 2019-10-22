<?php

namespace App\RequestDO;

use App\Entity\Category;
use App\Entity\Competition;
use Symfony\Component\Validator\Constraints as Assert;

class CompetitionRequest
{
    /**
     * @var null|Category
     * @Assert\NotBlank()
     */
    public $category;

    /**
     * @var null|\DateTimeInterface
     * @Assert\NotBlank()
     */
    public $startAt;

    /**
     * @var null|\DateTimeInterface
     * @Assert\NotBlank()
     */
    public $endAt;

    /**
     * @var null|string
     * @Assert\NotBlank()
     */
    public $title;

    /**
     * @var null|string
     */
    public $description;

    /**
     * @var null|float
     * @Assert\NotBlank()
     */
    public $weight;

    public function fill(Competition $competition): void
    {
        $competition->setCategory($this->category);
        $competition->setStartAt($this->startAt);
        $competition->setEndAt($this->endAt);
        $competition->setTitle($this->title);
        $competition->setDescription($this->description);
        $competition->setWeight($this->weight);
    }
}