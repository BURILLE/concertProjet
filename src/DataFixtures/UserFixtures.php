<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $u1 = new User();
        $u1->setUsername('cecile')
        ->setRoles(['ROLE_ADMIN'])
        ->setPassword('123456')
        ->setUuid(1);
        $manager->persist($u1);

        $manager->flush();

    }
}
