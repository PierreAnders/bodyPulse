<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230508145413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_information ADD COLUMN first_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_information ADD COLUMN last_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_information ADD COLUMN date_of_birth DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE user_information ADD COLUMN gender VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_information AS SELECT id, height, weight, bmi FROM user_information');
        $this->addSql('DROP TABLE user_information');
        $this->addSql('CREATE TABLE user_information (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, height DOUBLE PRECISION NOT NULL, weight DOUBLE PRECISION NOT NULL, bmi DOUBLE PRECISION DEFAULT NULL)');
        $this->addSql('INSERT INTO user_information (id, height, weight, bmi) SELECT id, height, weight, bmi FROM __temp__user_information');
        $this->addSql('DROP TABLE __temp__user_information');
    }
}
