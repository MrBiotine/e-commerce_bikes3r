<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240109151715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bike ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bike ADD CONSTRAINT FK_4CBC37803DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_4CBC37803DA5256D ON bike (image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bike DROP FOREIGN KEY FK_4CBC37803DA5256D');
        $this->addSql('DROP INDEX IDX_4CBC37803DA5256D ON bike');
        $this->addSql('ALTER TABLE bike DROP image_id');
    }
}
