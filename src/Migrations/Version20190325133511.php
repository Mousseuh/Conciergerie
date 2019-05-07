<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190325133511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE formule (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_605C9C98A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, formule_id INT DEFAULT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E19D9AD22A68F4D1 (formule_id), INDEX IDX_E19D9AD2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formule ADD CONSTRAINT FK_605C9C98A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD22A68F4D1 FOREIGN KEY (formule_id) REFERENCES formule (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD22A68F4D1');
        $this->addSql('DROP TABLE formule');
        $this->addSql('DROP TABLE service');
    }
}
