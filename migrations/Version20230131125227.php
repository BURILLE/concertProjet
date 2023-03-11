<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230131125227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, num INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE creature DROP FOREIGN KEY creature_ibfk_3');
        $this->addSql('ALTER TABLE creature DROP FOREIGN KEY creature_ibfk_1');
        $this->addSql('ALTER TABLE creature DROP FOREIGN KEY idEnclos');
        $this->addSql('ALTER TABLE creature DROP FOREIGN KEY creature_ibfk_2');
        $this->addSql('ALTER TABLE creature DROP FOREIGN KEY possede_ibfk_2');
        $this->addSql('DROP TABLE publications');
        $this->addSql('DROP TABLE corps');
        $this->addSql('DROP TABLE enclos');
        $this->addSql('DROP TABLE tete');
        $this->addSql('DROP TABLE jambe');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE creature');
        $this->addSql('DROP TABLE projets');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE publications (idPublication INT AUTO_INCREMENT NOT NULL, message TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, date DATETIME NOT NULL, loginAuteur VARCHAR(20) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(idPublication)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE corps (IDCorps INT NOT NULL, typeCorps VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_general_ci`, nomCorps VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(IDCorps)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE enclos (idEnclos INT NOT NULL, nom VARCHAR(100) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(idEnclos)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tete (IDTete INT NOT NULL, typeTete VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_general_ci`, nomTete VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(IDTete)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE jambe (IDJambe INT NOT NULL, typeJambe VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_general_ci`, nomJambe VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(IDJambe)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE joueur (mail VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, pseudo VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, mdp VARCHAR(25) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, tirage DATETIME DEFAULT \'\'\'2000-01-01 00:00:00\'\'\', PRIMARY KEY(mail)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE creature (mail VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, IDCreature VARCHAR(10) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, nom VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, couleur VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PV INT NOT NULL, IDTete INT NOT NULL, IDCorps INT NOT NULL, IDJambe INT NOT NULL, idEnclos INT DEFAULT 0, INDEX IDJambe (IDJambe), INDEX possede_ibfk_2 (mail), INDEX IDTete (IDTete), INDEX idEnclos (idEnclos), INDEX IDCorps (IDCorps), PRIMARY KEY(IDCreature, mail)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE projets (nomProjet VARCHAR(100) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, idProjet INT AUTO_INCREMENT NOT NULL, imageProjet VARCHAR(200) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, resumeProjet VARCHAR(2000) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, DateDebutProjet DATE DEFAULT \'NULL\', lienpage VARCHAR(2000) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, DateFinProjet DATE DEFAULT \'NULL\', PRIMARY KEY(idProjet)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE creature ADD CONSTRAINT creature_ibfk_3 FOREIGN KEY (IDJambe) REFERENCES jambe (IDJambe)');
        $this->addSql('ALTER TABLE creature ADD CONSTRAINT creature_ibfk_1 FOREIGN KEY (IDTete) REFERENCES tete (IDTete)');
        $this->addSql('ALTER TABLE creature ADD CONSTRAINT idEnclos FOREIGN KEY (idEnclos) REFERENCES enclos (idEnclos)');
        $this->addSql('ALTER TABLE creature ADD CONSTRAINT creature_ibfk_2 FOREIGN KEY (IDCorps) REFERENCES corps (IDCorps)');
        $this->addSql('ALTER TABLE creature ADD CONSTRAINT possede_ibfk_2 FOREIGN KEY (mail) REFERENCES joueur (mail)');
        $this->addSql('DROP TABLE user');
    }
}
