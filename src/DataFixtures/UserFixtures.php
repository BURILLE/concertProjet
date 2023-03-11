<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public const NUM_USER = 'user';
    public function load(ObjectManager $manager): void
    {
        $user = new User();

        $user->setNumUser(1)
            ->setName("ta")
            ->setFirstName("tata")
            ->setRole("spectateur")
            ->setPassword("1234")
            ;
        $manager->persist($user);

        $manager->flush();

        $this->addReference(self::NUM_USER, $user);

    }
}
