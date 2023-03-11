<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Concert;


class ConcertFixtures extends Fixture implements DependentFixtureInterface
{
    public const CONCERT_SEDEROULE = 'concert_sederoule';
    public const CONCERT_RESERVATION = 'concert_reservation';

    public function load(ObjectManager $manager): void
    {
        $concert = new Concert();
        $concert->setTitle("concert1")
                -> setDate(date_create("25-09-1989"))
                ->setNbPlaces(15)
                ->setNumConcert(1);

        $concert->addJoue($this->getReference(ArtistFixtures::JOUE_CONCERT));

        $manager->persist($concert);

        $manager->flush();

        $this->addReference(self::CONCERT_SEDEROULE, $concert);
        $this->addReference(self::CONCERT_RESERVATION, $concert);

    }

    public function getDependencies():array
    {
        return array(
            ArtistFixtures::class,
        );
    }
}
