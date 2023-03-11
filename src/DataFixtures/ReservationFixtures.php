<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ReservationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $reservation = new Reservation();

        $reservation-> setDate(date_create("25-09-1989"))
            ->setNumUser(2)
            ->setNumReservation(1)
            ->setNumReser($this->getReference(UserFixtures::NUM_USER)->getNumUser())
            ->setFaitReference($this->getReference(ConcertFixtures::CONCERT_RESERVATION));

        $manager->persist($reservation);

        $manager->flush();
    }
    public function getDependencies():array
    {
        return array(
            UserFixtures::class,
            ConcertFixtures::class,
        );
    }
}
