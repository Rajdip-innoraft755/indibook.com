<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411042309 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post_data (id INT AUTO_INCREMENT NOT NULL, post_id VARCHAR(255) NOT NULL, post_content VARCHAR(255) DEFAULT NULL, post_image VARCHAR(255) DEFAULT NULL, post_author VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_id VARCHAR(255) NOT NULL, unique_id VARCHAR(255) NOT NULL, f_name VARCHAR(50) NOT NULL, l_name VARCHAR(50) NOT NULL, email_id VARCHAR(255) NOT NULL, profile_pic VARCHAR(255) DEFAULT NULL, bio VARCHAR(255) DEFAULT NULL, cookie VARCHAR(25) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE post_data');
        $this->addSql('DROP TABLE user');
    }
}
