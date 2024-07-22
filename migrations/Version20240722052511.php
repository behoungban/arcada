<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240722052511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire_habitat (id INT AUTO_INCREMENT NOT NULL, habitat_id INT NOT NULL, veterinaire_id INT NOT NULL, commentaire VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_48FF20BBAFFE2D26 (habitat_id), INDEX IDX_48FF20BB5C80924 (veterinaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat_animal (id INT AUTO_INCREMENT NOT NULL, animal_id INT NOT NULL, etat VARCHAR(255) NOT NULL, nourriture VARCHAR(255) NOT NULL, grammage DOUBLE PRECISION NOT NULL, date_passage DATETIME NOT NULL, detail_etat LONGTEXT DEFAULT NULL, INDEX IDX_D850BF1B8E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nourriture (id INT AUTO_INCREMENT NOT NULL, animal_id INT NOT NULL, type VARCHAR(255) NOT NULL, quantity DOUBLE PRECISION NOT NULL, date_given DATETIME NOT NULL, INDEX IDX_7447E6138E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening_hours (id INT AUTO_INCREMENT NOT NULL, opening_monday TIME DEFAULT NULL, closing_monday TIME DEFAULT NULL, opening_tuesday TIME DEFAULT NULL, closing_tuesday TIME DEFAULT NULL, opening_wednesday TIME DEFAULT NULL, closing_wednesday TIME DEFAULT NULL, opening_thursday TIME DEFAULT NULL, closing_thursday TIME DEFAULT NULL, opening_friday TIME DEFAULT NULL, closing_friday TIME DEFAULT NULL, opening_saturday TIME DEFAULT NULL, closing_saturday TIME DEFAULT NULL, opening_sunday TIME DEFAULT NULL, closing_sunday TIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire_habitat ADD CONSTRAINT FK_48FF20BBAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE commentaire_habitat ADD CONSTRAINT FK_48FF20BB5C80924 FOREIGN KEY (veterinaire_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE etat_animal ADD CONSTRAINT FK_D850BF1B8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE nourriture ADD CONSTRAINT FK_7447E6138E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE contact CHANGE subject subject TINYTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_habitat DROP FOREIGN KEY FK_48FF20BBAFFE2D26');
        $this->addSql('ALTER TABLE commentaire_habitat DROP FOREIGN KEY FK_48FF20BB5C80924');
        $this->addSql('ALTER TABLE etat_animal DROP FOREIGN KEY FK_D850BF1B8E962C16');
        $this->addSql('ALTER TABLE nourriture DROP FOREIGN KEY FK_7447E6138E962C16');
        $this->addSql('DROP TABLE commentaire_habitat');
        $this->addSql('DROP TABLE etat_animal');
        $this->addSql('DROP TABLE nourriture');
        $this->addSql('DROP TABLE opening_hours');
        $this->addSql('ALTER TABLE contact CHANGE subject subject VARCHAR(255) NOT NULL');
    }
}
