<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190325140221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_formule (user_id INT NOT NULL, formule_id INT NOT NULL, INDEX IDX_38518292A76ED395 (user_id), INDEX IDX_385182922A68F4D1 (formule_id), PRIMARY KEY(user_id, formule_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formules (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formules_service (formules_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_3A338279168F3793 (formules_id), INDEX IDX_3A338279ED5CA9E6 (service_id), PRIMARY KEY(formules_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_service (users_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_119DEE1867B3B43D (users_id), INDEX IDX_119DEE18ED5CA9E6 (service_id), PRIMARY KEY(users_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_formule ADD CONSTRAINT FK_38518292A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_formule ADD CONSTRAINT FK_385182922A68F4D1 FOREIGN KEY (formule_id) REFERENCES formule (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formules_service ADD CONSTRAINT FK_3A338279168F3793 FOREIGN KEY (formules_id) REFERENCES formules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formules_service ADD CONSTRAINT FK_3A338279ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_service ADD CONSTRAINT FK_119DEE1867B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_service ADD CONSTRAINT FK_119DEE18ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formule DROP FOREIGN KEY FK_605C9C98A76ED395');
        $this->addSql('DROP INDEX IDX_605C9C98A76ED395 ON formule');
        $this->addSql('ALTER TABLE formule DROP user_id');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD22A68F4D1');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2A76ED395');
        $this->addSql('DROP INDEX IDX_E19D9AD2A76ED395 ON service');
        $this->addSql('DROP INDEX IDX_E19D9AD22A68F4D1 ON service');
        $this->addSql('ALTER TABLE service DROP formule_id, DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE formules_service DROP FOREIGN KEY FK_3A338279168F3793');
        $this->addSql('ALTER TABLE users_service DROP FOREIGN KEY FK_119DEE1867B3B43D');
        $this->addSql('DROP TABLE user_formule');
        $this->addSql('DROP TABLE formules');
        $this->addSql('DROP TABLE formules_service');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_service');
        $this->addSql('ALTER TABLE formule ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formule ADD CONSTRAINT FK_605C9C98A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_605C9C98A76ED395 ON formule (user_id)');
        $this->addSql('ALTER TABLE service ADD formule_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD22A68F4D1 FOREIGN KEY (formule_id) REFERENCES formule (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD2A76ED395 ON service (user_id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD22A68F4D1 ON service (formule_id)');
    }
}
