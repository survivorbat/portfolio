<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190830183322 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE image (id VARCHAR(255) NOT NULL, project_id VARCHAR(255) DEFAULT NULL, mime_type VARCHAR(255) DEFAULT \'\' NOT NULL, filename VARCHAR(255) DEFAULT \'\' NOT NULL, file_path VARCHAR(255) DEFAULT \'\' NOT NULL, image_updated DATETIME DEFAULT NULL, public_path VARCHAR(255) DEFAULT \'\' NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_C53D045F166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technology (id VARCHAR(255) NOT NULL, image_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT \'\' NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_F463524D3DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technology_status_update (technology_id VARCHAR(255) NOT NULL, status_update_id VARCHAR(255) NOT NULL, INDEX IDX_737C729D4235D463 (technology_id), INDEX IDX_737C729D5D036AF0 (status_update_id), PRIMARY KEY(technology_id, status_update_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technology_project (technology_id VARCHAR(255) NOT NULL, project_id VARCHAR(255) NOT NULL, INDEX IDX_6EFD95584235D463 (technology_id), INDEX IDX_6EFD9558166D1F9C (project_id), PRIMARY KEY(technology_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience_topic (id VARCHAR(255) NOT NULL, technology_id VARCHAR(255) DEFAULT NULL, since DATETIME NOT NULL, explanation LONGTEXT NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_FE12A20D4235D463 (technology_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT \'\' NOT NULL, description LONGTEXT NOT NULL, link VARCHAR(255) DEFAULT NULL, position INT NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status_update (id VARCHAR(255) NOT NULL, image_id VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT \'\' NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_256F9D353DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE technology ADD CONSTRAINT FK_F463524D3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE technology_status_update ADD CONSTRAINT FK_737C729D4235D463 FOREIGN KEY (technology_id) REFERENCES technology (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE technology_status_update ADD CONSTRAINT FK_737C729D5D036AF0 FOREIGN KEY (status_update_id) REFERENCES status_update (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE technology_project ADD CONSTRAINT FK_6EFD95584235D463 FOREIGN KEY (technology_id) REFERENCES technology (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE technology_project ADD CONSTRAINT FK_6EFD9558166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experience_topic ADD CONSTRAINT FK_FE12A20D4235D463 FOREIGN KEY (technology_id) REFERENCES technology (id)');
        $this->addSql('ALTER TABLE status_update ADD CONSTRAINT FK_256F9D353DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE technology DROP FOREIGN KEY FK_F463524D3DA5256D');
        $this->addSql('ALTER TABLE status_update DROP FOREIGN KEY FK_256F9D353DA5256D');
        $this->addSql('ALTER TABLE technology_status_update DROP FOREIGN KEY FK_737C729D4235D463');
        $this->addSql('ALTER TABLE technology_project DROP FOREIGN KEY FK_6EFD95584235D463');
        $this->addSql('ALTER TABLE experience_topic DROP FOREIGN KEY FK_FE12A20D4235D463');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F166D1F9C');
        $this->addSql('ALTER TABLE technology_project DROP FOREIGN KEY FK_6EFD9558166D1F9C');
        $this->addSql('ALTER TABLE technology_status_update DROP FOREIGN KEY FK_737C729D5D036AF0');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE technology');
        $this->addSql('DROP TABLE technology_status_update');
        $this->addSql('DROP TABLE technology_project');
        $this->addSql('DROP TABLE experience_topic');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE status_update');
    }
}
