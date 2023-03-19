<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Band;

class BandFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $b1 = new Band();
        $b1->setName('Korn')
            ->setStyle('Metal')
            ->setPicture('Korn.jpg')
            ->setCreationYear(new \DateTime(1993))
            ->setLastAlbumName('The Nothing')
            ->addMember($this->getReference(MemberFixtures::KORN_1))
            ->addMember($this->getReference(MemberFixtures::KORN_2))
            ->addMember($this->getReference(MemberFixtures::KORN_3))
            ->addMember($this->getReference(MemberFixtures::KORN_4))
            ->addMember($this->getReference(MemberFixtures::KORN_5));

        $manager->persist($b1);

        $manager->flush();
        $b2 = new Band();
        $b2->setName('love patrol alpha')
            ->setStyle('pop')
            ->setPicture('love_patrol_alpha.webp')
            ->setCreationYear(new \DateTime(2017))
            ->setLastAlbumName('Taking Over Midnight')
            ->addMember($this->getReference(MemberFixtures::LPA_1))
            ->addMember($this->getReference(MemberFixtures::LPA_2))
            ->addMember($this->getReference(MemberFixtures::LPA_3));

        $manager->persist($b2);

        $manager->flush();

        $b3 = new Band();
        $b3->setName('Deadlift Lolita')
            ->setStyle('Metal Kawaii japonais')
            ->setPicture('deadlift_lolita.jpg')
            ->setCreationYear(new \DateTime(2017))
            ->setLastAlbumName('Muscle Cocktail')
            ->addMember($this->getReference(MemberFixtures::DL_1))
            ->addMember($this->getReference(MemberFixtures::DL_2));

        $manager->persist($b3);

        $manager->flush();

        $b4 = new Band();
        $b4->setName('Tenacious D')
            ->setStyle('Rock')
            ->setPicture('Tenacious.jpg')
            ->setCreationYear(new \DateTime(1994))
            ->setLastAlbumName('Post-Apocalypto')
            ->addMember($this->getReference(MemberFixtures::TD_1))
            ->addMember($this->getReference(MemberFixtures::TD_2));

        $manager->persist($b4);

        $manager->flush();

        $b5 = new Band();
        $b5->setName('Les Fatals Picards')
            ->setStyle('Punk et rock français')
            ->setPicture('LFP.jpg')
            ->setCreationYear(new \DateTime(1997))
            ->setLastAlbumName('Espèces menacées')
            ->addMember($this->getReference(MemberFixtures::LFP_1))
            ->addMember($this->getReference(MemberFixtures::LFP_2));

        $manager->persist($b5);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return array(
            MemberFixtures::class,
        );
    }
}