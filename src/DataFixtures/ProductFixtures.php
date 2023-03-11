<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();

        $product->setNom('brosse a cheveux')
            ->setPrix(30)
            ->setDescription('brosse a cheveux de thomas dezeur');
        $manager->persist($product);

        $manager->flush();
    }
}
