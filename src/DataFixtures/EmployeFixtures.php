<?php

namespace App\DataFixtures;

use App\Entity\Employe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EmployeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0 ; $i<20 ; $i++) {
            $employe = new Employe();
            $employe->setPrenom($faker->firstName);
            $employe->setNom($faker->lastName);

            $manager->persist($employe);
        }
        $manager->flush();
    }
}
