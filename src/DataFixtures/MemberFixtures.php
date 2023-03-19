<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Member;

/**
 * Class MemberFixtures
 * @package App\DataFixtures
 */
class MemberFixtures extends Fixture
{
    public const KORN_1 = 'a1';
    public const KORN_2 = 'a2';
    public const KORN_3 = 'a3';
    public const KORN_4 = 'a4';
    public const KORN_5 = 'a5';
    public const LPA_1 = 'b1';
    public const LPA_2 = 'b2';
    public const LPA_3 = 'b3';
    public const DL_1 = 'c1';
    public const DL_2 = 'c2';
    public const TD_1 = 'd1';
    public const TD_2 = 'd2';
    public const LFP_1 = 'e1';
    public const LFP_2 = 'e2';
    public const LFP_3 = 'e3';
    public const LFP_4 = 'e4';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $a1 = new Member();
        $a1->setName('Jonathan')
            ->setFirstName('Davies')
            ->setjob('Chanteur')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '18/01/1971'))
            ->setPicture('jonathanDavies.jpg');
        $manager->persist($a1);

        $a2 = new Member();
        $a2->setName('Reginald')
            ->setFirstName('Arvizu')
            ->setjob('Bassiste')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '02/11/1969'))
            ->setPicture('reginaldArvizu.jpg');
        $manager->persist($a2);

        $a3 = new Member();
        $a3->setName('James')
            ->setFirstName('Shaffer')
            ->setjob('Guitariste')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '06/06/1970'))
            ->setPicture('jamesShaffer.jpg');
        $manager->persist($a3);

        $a4 = new Member();
        $a4->setName('Brian')
            ->setFirstName('Welch')
            ->setjob('Guitariste')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '19/06/1970'))
            ->setPicture('brianWelch.jpg');
        $manager->persist($a4);

        $a5 = new Member();
        $a5->setName('Ray')
            ->setFirstName('Luzier')
            ->setJob('Batteur')
            ->setPicture('rayLuzier.jpg')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '02/11/1969'));
        $manager->persist($a5);

        $b1 = new Member();
        $b1->setName('Pines')
            ->setFirstName('Mabel')
            ->setJob('Chanteur')
            ->setPicture('mabel.jpg')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '31/08/1999'));
        $manager->persist($b1);

        $b2 = new Member();
        $b2->setName('Pines')
            ->setFirstName('Dipper')
            ->setJob('Chanteur')
            ->setPicture('dipper.webp')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '31/08/1952'));
        $manager->persist($b2);

        $b3 = new Member();
        $b3->setName('Pines')
            ->setFirstName('Stan')
            ->setJob('Chanteur')
            ->setPicture('stan.avif')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '15/06/1999'));
        $manager->persist($b3);

        $c1 = new Member();
        $c1->setName('Magarey')
            ->setFirstName('Richard')
            ->setJob('Chanteur')
            ->setPicture('ladybeard.webp')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '03/08/1983'));
        $manager->persist($c1);

        $c2 = new Member();
        $c2->setName('Reika')
            ->setFirstName('Saiki')
            ->setJob('Chanteur')
            ->setPicture('SaikiReika.jpg')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '19/05/1992'));
        $manager->persist($c2);

        $d1 = new Member();
        $d1->setName('Black')
            ->setFirstName('Jack')
            ->setJob('Chanteur, guitariste')
            ->setPicture('jack-black.webp')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '28/08/1969'));
        $manager->persist($d1);

        $d2 = new Member();
        $d2->setName('Gass')
            ->setFirstName('Kyle')
            ->setJob('Chanteur, guitariste')
            ->setPicture('jack-black.webp')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '14/07/1960'));
        $manager->persist($d2);

        $e1 = new Member();
        $e1->setName('Léger')
            ->setFirstName('Paul')
            ->setJob('Chanteur, kazoo, flutiste à coulisses, guitariste')
            ->setPicture('paul_leger.jpg')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '31/08/1977'));
        $manager->persist($e1);

        $e2 = new Member();
        $e2->setName('Honel')
            ->setFirstName('Laurent')
            ->setJob('Chanteur, guitariste, bassite, ')
            ->setPicture('paul_leger.jpg')
            ->setBirthDate(\DateTime::createFromFormat("d/m/Y", '31/08/1977'));
        $manager->persist($e2);

        $manager->flush();

        // other fixtures can get this object using the UserFixtures::ADMIN_USER_REFERENCE constant
        $this->addReference(self::KORN_1, $a1);
        $this->addReference(self::KORN_2, $a2);
        $this->addReference(self::KORN_3, $a3);
        $this->addReference(self::KORN_4, $a4);
        $this->addReference(self::KORN_5, $a5);
        $this->addReference(self::LPA_1, $b1);
        $this->addReference(self::LPA_2, $b2);
        $this->addReference(self::LPA_3, $b3);
        $this->addReference(self::DL_1, $c1);
        $this->addReference(self::DL_2, $c2);
        $this->addReference(self::TD_1, $d1);
        $this->addReference(self::TD_2, $d2);
        $this->addReference(self::LFP_1, $e1);
        $this->addReference(self::LFP_2, $e2);
        /*
        $this->addReference(self::LFP_3, $e3);
        $this->addReference(self::LFP_4, $e4);
        */
    }
}