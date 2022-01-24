<?php

namespace App\DataFixtures;

use App\Entity\Todo;
use Faker\Factory;
use Faker\ORM\Doctrine\Populator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    private $manager;
    private $faker;

    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;
        $this->faker = Factory::create('fr_FR');

        $todo = new Todo();
        $todo->setName($this->faker->sentence(6,true));
        $todo->setDescription($this->faker->sentence(18,true));
        $manager->persist($todo);
        $manager->flush();
    }
}
