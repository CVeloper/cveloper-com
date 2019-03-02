<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190302114750 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, id_developer_id INT NOT NULL, position VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, date_from VARCHAR(255) NOT NULL, date_to VARCHAR(255) NOT NULL, INDEX IDX_590C103471CE715 (id_developer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, id_developer_id INT NOT NULL, degree VARCHAR(255) NOT NULL, institution VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, date_from VARCHAR(255) NOT NULL, date_to VARCHAR(255) DEFAULT NULL, INDEX IDX_D5128A8F471CE715 (id_developer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103471CE715 FOREIGN KEY (id_developer_id) REFERENCES developer (id)');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F471CE715 FOREIGN KEY (id_developer_id) REFERENCES developer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE training');
    }
}
