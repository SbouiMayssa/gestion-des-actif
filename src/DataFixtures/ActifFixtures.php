<?php

namespace App\DataFixtures;

use App\Entity\Actif;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ActifFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $components = [
            'PC' => 'Hardware',
            'Printer' => 'Peripheral',
            'Router' => 'Network',
            'Switch' => 'Network',
            'Monitor' => 'Hardware',
            'Keyboard' => 'Peripheral',
            'Mouse' => 'Peripheral',
            'Server' => 'Hardware'
        ];

        foreach ($components as $nom => $type) {
            $actif = new Actif();
            $actif->setNom($nom);
            $actif->setNumSerie($faker->unique()->uuid());
            $actif->setType($type);
            $actif->setEtat($faker->randomElement(['Disponible', 'Hors service', 'En panne']));
            $actif->setDateAcquisation($faker->dateTimeBetween('-5 years', 'now'));
            $actif->setBatiment($faker->randomElement(['A', 'B', 'C', 'D']));

            $manager->persist($actif);
        }

        $manager->flush();
    }
}
