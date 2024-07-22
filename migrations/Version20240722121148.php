<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240722121148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation ADD veterinaire_id INT NOT NULL, ADD habitat_id INT DEFAULT NULL, ADD etat LONGTEXT DEFAULT NULL, ADD nourriture VARCHAR(255) DEFAULT NULL, ADD grammage INT DEFAULT NULL, ADD date DATETIME NOT NULL, DROP animal_name, CHANGE view_count animal_id INT NOT NULL');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A68E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A65C80924 FOREIGN KEY (veterinaire_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6AFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('CREATE INDEX IDX_964685A68E962C16 ON consultation (animal_id)');
        $this->addSql('CREATE INDEX IDX_964685A65C80924 ON consultation (veterinaire_id)');
        $this->addSql('CREATE INDEX IDX_964685A6AFFE2D26 ON consultation (habitat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A68E962C16');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A65C80924');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6AFFE2D26');
        $this->addSql('DROP INDEX IDX_964685A68E962C16 ON consultation');
        $this->addSql('DROP INDEX IDX_964685A65C80924 ON consultation');
        $this->addSql('DROP INDEX IDX_964685A6AFFE2D26 ON consultation');
        $this->addSql('ALTER TABLE consultation ADD animal_name VARCHAR(255) NOT NULL, ADD view_count INT NOT NULL, DROP animal_id, DROP veterinaire_id, DROP habitat_id, DROP etat, DROP nourriture, DROP grammage, DROP date');
    }
}
