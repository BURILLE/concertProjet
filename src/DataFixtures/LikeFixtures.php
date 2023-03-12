<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Like;

class LikeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $like = new Like();

        $like->setNumTag($this->getReference(TagsFixtures::TAG_AIME)->getId())
        ->setNumUser($this->getReference(UserFixtures::NUM_USER)->getNumUser());

        $manager->persist($like);

        $manager->flush();
    }

    public function getDependencies():array
    {
        return array(
            TagsFixtures::class,
            UserFixtures::class,
        );
    }

}
