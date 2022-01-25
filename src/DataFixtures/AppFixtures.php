<?php

namespace App\DataFixtures;

use App\Entity\Items;
use App\Factory\ItemsFactory;
use App\Factory\QuestionFactory;
use App\Factory\UsersFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ItemsFactory::createMany(30);
        QuestionFactory::createMany(100);
        UsersFactory::createMany(30);
    }
}
