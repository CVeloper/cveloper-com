<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190305191046 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dev_tech CHANGE id_developer_id id_developer_id INT NOT NULL');
        $this->addSql('ALTER TABLE training CHANGE date_from date_from DATETIME NOT NULL, CHANGE date_to date_to DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE experience CHANGE date_from date_from DATETIME NOT NULL, CHANGE date_to date_to DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD username VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) DEFAULT NULL, ADD id_github VARCHAR(255) DEFAULT NULL, DROP type, DROP user, DROP pass, DROP auth');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dev_tech CHANGE id_developer_id id_developer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE experience CHANGE date_from date_from VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE date_to date_to VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE training CHANGE date_from date_from VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE date_to date_to VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677 ON user');
        $this->addSql('ALTER TABLE user ADD type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD user VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD pass VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD auth VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP username, DROP roles, DROP password, DROP id_github');
    }
}
