<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170917160318 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('INSERT INTO file (id, name, folder_id) VALUES (1, ".file", 1)');
        $this->addSql('INSERT INTO file (id, name, folder_id) VALUES (2, ".gitignore", 3)');
        $this->addSql('INSERT INTO file (id, name, folder_id) VALUES (3, "notes.txt", 3)');
        $this->addSql('INSERT INTO folder (id, name, parent_id) VALUES (5, "anonymous", 2)');
        $this->addSql('INSERT INTO file (id, name, folder_id) VALUES (4, "password.txt", 5)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
