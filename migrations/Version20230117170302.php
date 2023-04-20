<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230117170302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item ADD item_image2 VARCHAR(255) DEFAULT NULL, ADD item_image3 VARCHAR(255) DEFAULT NULL, ADD item_image4 VARCHAR(255) DEFAULT NULL, CHANGE item_image item_image1 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item ADD item_image VARCHAR(255) DEFAULT NULL, DROP item_image1, DROP item_image2, DROP item_image3, DROP item_image4');
    }
}
