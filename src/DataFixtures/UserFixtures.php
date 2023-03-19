<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setUsername = 'admin';
        $admin->setRoles = ['ROLE_ADMIN'];
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();

        $u1 = new User();
        $u1->setUsername('cecile')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword('1234');

        $manager->persist($u1);
        $manager->flush();

    }
}