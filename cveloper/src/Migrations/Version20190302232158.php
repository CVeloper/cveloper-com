<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190302232158 extends AbstractMigration
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
        $this->addSql('CREATE TABLE additional (id INT AUTO_INCREMENT NOT NULL, id_developer_id INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_8BD05CE6471CE715 (id_developer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, id_developer_id INT NOT NULL, position VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, date_from VARCHAR(255) NOT NULL, date_to VARCHAR(255) DEFAULT NULL, INDEX IDX_590C103471CE715 (id_developer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, user VARCHAR(255) NOT NULL, pass VARCHAR(255) DEFAULT NULL, auth VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, id_developer_id INT NOT NULL, degree VARCHAR(255) NOT NULL, institution VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, date_from VARCHAR(255) NOT NULL, date_to VARCHAR(255) DEFAULT NULL, INDEX IDX_D5128A8F471CE715 (id_developer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE developer (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code INT NOT NULL, city VARCHAR(255) NOT NULL, phone INT NOT NULL, github VARCHAR(255) DEFAULT NULL, linkedin VARCHAR(255) DEFAULT NULL, web VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_65FB8B9A79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dev_tech (id INT AUTO_INCREMENT NOT NULL, id_developer_id INT DEFAULT NULL, id_tech_id INT NOT NULL, level INT NOT NULL, INDEX IDX_28CD4BA2471CE715 (id_developer_id), INDEX IDX_28CD4BA2BAEFD28C (id_tech_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE additional ADD CONSTRAINT FK_8BD05CE6471CE715 FOREIGN KEY (id_developer_id) REFERENCES developer (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103471CE715 FOREIGN KEY (id_developer_id) REFERENCES developer (id)');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F471CE715 FOREIGN KEY (id_developer_id) REFERENCES developer (id)');
        $this->addSql('ALTER TABLE developer ADD CONSTRAINT FK_65FB8B9A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE dev_tech ADD CONSTRAINT FK_28CD4BA2471CE715 FOREIGN KEY (id_developer_id) REFERENCES developer (id)');
        $this->addSql('ALTER TABLE dev_tech ADD CONSTRAINT FK_28CD4BA2BAEFD28C FOREIGN KEY (id_tech_id) REFERENCES technology (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dev_tech DROP FOREIGN KEY FK_28CD4BA2BAEFD28C');
        $this->addSql('ALTER TABLE developer DROP FOREIGN KEY FK_65FB8B9A79F37AE5');
        $this->addSql('ALTER TABLE additional DROP FOREIGN KEY FK_8BD05CE6471CE715');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103471CE715');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8F471CE715');
        $this->addSql('ALTER TABLE dev_tech DROP FOREIGN KEY FK_28CD4BA2471CE715');
        $this->addSql('DROP TABLE technology');
        $this->addSql('DROP TABLE additional');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE developer');
        $this->addSql('DROP TABLE dev_tech');
    }
}
