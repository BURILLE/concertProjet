<?php

namespace App\DataFixtures;

use App\Entity\Hall;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HallFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $hall = new Hall();
        $hall->setName('salle1')
        ->setContact('tot@gmail.com')
        ->setAdress('15 rue de jesaispassou, 0000 null-part');

        $hall->setSeDeroule($this->getReference(ConcertFixtures::CONCERT_SEDEROULE));

        $manager->persist($hall);

        $manager->flush();
    }
    public function getDependencies():array
    {
        return array(
            ConcertFixtures::class,
        );
    }
}
