<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210221184317 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pilot_race_results (id INT AUTO_INCREMENT NOT NULL, pilot_id VARCHAR(50) DEFAULT NULL, race_id INT DEFAULT NULL, position INT NOT NULL, total_time VARCHAR(20) NOT NULL, best_lap VARCHAR(15) NOT NULL, points INT NOT NULL, INDEX IDX_120A79F6CE55439B (pilot_id), INDEX IDX_120A79F66E59D40D (race_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pilot_race_results ADD CONSTRAINT FK_120A79F6CE55439B FOREIGN KEY (pilot_id) REFERENCES pilot (id)');
        $this->addSql('ALTER TABLE pilot_race_results ADD CONSTRAINT FK_120A79F66E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pilot_race_results');
    }
}
