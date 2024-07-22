<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240722171129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation ADD commentaire_habitat_id INT DEFAULT NULL, DROP etat, CHANGE date date_passage DATETIME NOT NULL');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A617CC1FA6 FOREIGN KEY (commentaire_habitat_id) REFERENCES commentaire_habitat (id)');
        $this->addSql('CREATE INDEX IDX_964685A617CC1FA6 ON consultation (commentaire_habitat_id)');
        $this->addSql('ALTER TABLE etat_animal ADD consultation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etat_animal ADD CONSTRAINT FK_D850BF1B62FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)');
        $this->addSql('CREATE INDEX IDX_D850BF1B62FF6CDF ON etat_animal (consultation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A617CC1FA6');
        $this->addSql('DROP INDEX IDX_964685A617CC1FA6 ON consultation');
        $this->addSql('ALTER TABLE consultation ADD etat LONGTEXT DEFAULT NULL, DROP commentaire_habitat_id, CHANGE date_passage date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE etat_animal DROP FOREIGN KEY FK_D850BF1B62FF6CDF');
        $this->addSql('DROP INDEX IDX_D850BF1B62FF6CDF ON etat_animal');
        $this->addSql('ALTER TABLE etat_animal DROP consultation_id');
    }
}
