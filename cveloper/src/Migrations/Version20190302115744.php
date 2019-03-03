<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190302115744 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE technology (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dev_tech (id INT AUTO_INCREMENT NOT NULL, id_developer_id INT DEFAULT NULL, id_tech_id INT NOT NULL, level INT NOT NULL, INDEX IDX_28CD4BA2471CE715 (id_developer_id), INDEX IDX_28CD4BA2BAEFD28C (id_tech_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dev_tech ADD CONSTRAINT FK_28CD4BA2471CE715 FOREIGN KEY (id_developer_id) REFERENCES developer (id)');
        $this->addSql('ALTER TABLE dev_tech ADD CONSTRAINT FK_28CD4BA2BAEFD28C FOREIGN KEY (id_tech_id) REFERENCES technology (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dev_tech DROP FOREIGN KEY FK_28CD4BA2BAEFD28C');
        $this->addSql('DROP TABLE technology');
        $this->addSql('DROP TABLE dev_tech');
    }
}
