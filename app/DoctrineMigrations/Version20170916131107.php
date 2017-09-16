<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170916131107 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('INSERT INTO folder (id, parent_id, name) VALUES (1, NULL, "/")');
        $this->addSql('INSERT INTO folder (id, parent_id, name) VALUES (2, 1, "users")');
        $this->addSql('INSERT INTO folder (id, parent_id, name) VALUES (3, 2, "radiuso")');
        $this->addSql('INSERT INTO folder (id, parent_id, name) VALUES (4, 1, "etc")');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
