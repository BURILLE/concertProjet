<?php

namespace App\DataFixtures;

use App\Entity\Tags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagsFixtures extends Fixture
{
    public const TAG_AIME = 'tag';
    public const TAG_ARTIST = 'toto';
    public function load(ObjectManager $manager): void
    {
        $tag = new Tags();

        $tag-> setTypeMusic("rock");
        $manager->persist($tag);

        $manager->flush();
        $this->addReference(self::TAG_AIME, $tag);
        $this->addReference(self::TAG_ARTIST, $tag);

    }
}
