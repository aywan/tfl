<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BusinessFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setTitle('Городской рейтинг');
        $category->setDescription('общий городской рейтинг');
        $manager->persist($category);

        $manager->flush();
    }
}
