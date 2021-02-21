<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210221120233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pilot_race_lap (id INT AUTO_INCREMENT NOT NULL, pilot_id VARCHAR(50) NOT NULL, race_id INT NOT NULL, time VARCHAR(14) NOT NULL, INDEX IDX_ECC9A019CE55439B (pilot_id), INDEX IDX_ECC9A0196E59D40D (race_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pilot_race_lap ADD CONSTRAINT FK_ECC9A019CE55439B FOREIGN KEY (pilot_id) REFERENCES pilot (id)');
        $this->addSql('ALTER TABLE pilot_race_lap ADD CONSTRAINT FK_ECC9A0196E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pilot_race_lap');
    }
}
