<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240205094629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_bike DROP FOREIGN KEY FK_14D0D978827BC75');
        $this->addSql('ALTER TABLE order_bike ADD CONSTRAINT FK_14D0D978827BC75 FOREIGN KEY (order_customer_id) REFERENCES order_customer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_bike DROP FOREIGN KEY FK_14D0D978827BC75');
        $this->addSql('ALTER TABLE order_bike ADD CONSTRAINT FK_14D0D978827BC75 FOREIGN KEY (order_customer_id) REFERENCES order_customer (id) ON UPDATE CASCADE ON DELETE NO ACTION');
    }
}
