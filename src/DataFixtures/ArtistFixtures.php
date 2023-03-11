<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Artist;

class ArtistFixtures extends Fixture implements DependentFixtureInterface
{
    public const JOUE_CONCERT = 'artist';
    public function load(ObjectManager $manager): void
    {

        $artist = new Artist();
        $artist -> setNom('toto')
                -> setNumArtist(1)
                ->addGenre($this->getReference(TagsFixtures::TAG_ARTIST));

        $manager->persist($artist);

        $manager->flush();
        $this->addReference(self::JOUE_CONCERT, $artist);

    }

    public function getDependencies():array
    {
        return array(
            TagsFixtures::class,
        );
    }
}
