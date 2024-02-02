<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201194652 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bike ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bike ADD CONSTRAINT FK_4CBC37803DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_4CBC37803DA5256D ON bike (image_id)');
        $this->addSql('ALTER TABLE order_customer ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_customer ADD CONSTRAINT FK_60C16CB8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_60C16CB8A76ED395 ON order_customer (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_customer DROP FOREIGN KEY FK_60C16CB8A76ED395');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE bike DROP FOREIGN KEY FK_4CBC37803DA5256D');
        $this->addSql('DROP INDEX IDX_4CBC37803DA5256D ON bike');
        $this->addSql('ALTER TABLE bike DROP image_id');
        $this->addSql('DROP INDEX IDX_60C16CB8A76ED395 ON order_customer');
        $this->addSql('ALTER TABLE order_customer DROP user_id');
    }
}
