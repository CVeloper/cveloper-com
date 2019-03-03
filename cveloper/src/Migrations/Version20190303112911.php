<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190303112911 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE experience CHANGE date_from date_from DATETIME NOT NULL, CHANGE date_to date_to DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE training CHANGE date_from date_from DATETIME NOT NULL, CHANGE date_to date_to DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE experience CHANGE date_from date_from DATE NOT NULL, CHANGE date_to date_to DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE training CHANGE date_from date_from DATE NOT NULL, CHANGE date_to date_to DATE DEFAULT NULL');
    }
}
