<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240107205651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bike (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, color_id INT DEFAULT NULL, size_id INT DEFAULT NULL, reference_bike VARCHAR(255) NOT NULL, name_bike VARCHAR(100) NOT NULL, description_bike LONGTEXT DEFAULT NULL, price_bike VARCHAR(100) DEFAULT NULL, INDEX IDX_4CBC378012469DE2 (category_id), INDEX IDX_4CBC37807ADA1FB5 (color_id), INDEX IDX_4CBC3780498DA827 (size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name_category VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, code_color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, frame VARCHAR(255) DEFAULT NULL, front_wheel VARCHAR(255) DEFAULT NULL, cockpit VARCHAR(255) DEFAULT NULL, chainset VARCHAR(255) DEFAULT NULL, rear_wheel VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_bike (id INT AUTO_INCREMENT NOT NULL, bike_id INT DEFAULT NULL, order_customer_id INT NOT NULL, quantity_order INT NOT NULL, INDEX IDX_14D0D97D5A4816F (bike_id), INDEX IDX_14D0D978827BC75 (order_customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_customer (id INT AUTO_INCREMENT NOT NULL, number_order VARCHAR(255) NOT NULL, date_order DATE NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, address VARCHAR(150) NOT NULL, postcode VARCHAR(50) NOT NULL, city VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE receipt (id INT AUTO_INCREMENT NOT NULL, order_customer_id INT NOT NULL, number_receipt VARCHAR(255) NOT NULL, date_receipt DATE NOT NULL, totalttc NUMERIC(10, 2) DEFAULT NULL, UNIQUE INDEX UNIQ_5399B6458827BC75 (order_customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE size (id INT AUTO_INCREMENT NOT NULL, value_size VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bike ADD CONSTRAINT FK_4CBC378012469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE bike ADD CONSTRAINT FK_4CBC37807ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE bike ADD CONSTRAINT FK_4CBC3780498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE order_bike ADD CONSTRAINT FK_14D0D97D5A4816F FOREIGN KEY (bike_id) REFERENCES bike (id)');
        $this->addSql('ALTER TABLE order_bike ADD CONSTRAINT FK_14D0D978827BC75 FOREIGN KEY (order_customer_id) REFERENCES order_customer (id)');
        $this->addSql('ALTER TABLE receipt ADD CONSTRAINT FK_5399B6458827BC75 FOREIGN KEY (order_customer_id) REFERENCES order_customer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bike DROP FOREIGN KEY FK_4CBC378012469DE2');
        $this->addSql('ALTER TABLE bike DROP FOREIGN KEY FK_4CBC37807ADA1FB5');
        $this->addSql('ALTER TABLE bike DROP FOREIGN KEY FK_4CBC3780498DA827');
        $this->addSql('ALTER TABLE order_bike DROP FOREIGN KEY FK_14D0D97D5A4816F');
        $this->addSql('ALTER TABLE order_bike DROP FOREIGN KEY FK_14D0D978827BC75');
        $this->addSql('ALTER TABLE receipt DROP FOREIGN KEY FK_5399B6458827BC75');
        $this->addSql('DROP TABLE bike');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE order_bike');
        $this->addSql('DROP TABLE order_customer');
        $this->addSql('DROP TABLE receipt');
        $this->addSql('DROP TABLE size');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
