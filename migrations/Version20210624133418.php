<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210624133418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, number VARCHAR(10) NOT NULL, street VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip_code INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE housing (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, address_id INTEGER NOT NULL, prospect_id INTEGER NOT NULL, discr VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_FB8142C3F5B7AF75 ON housing (address_id)');
        $this->addSql('CREATE INDEX IDX_FB8142C3D182060A ON housing (prospect_id)');
        $this->addSql('CREATE TABLE prospect (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, address_id INTEGER NOT NULL, mail VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C9CE8C7DF5B7AF75 ON prospect (address_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE housing');
        $this->addSql('DROP TABLE prospect');
    }
}
