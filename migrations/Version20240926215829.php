<?php

declare(strict_types=1);

namespace Alura\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240926215829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('teste');

        $column = $table->addColumn('id', 'integer');
        $column->setAutoincrement(true);

        $table->addColumn('teste', 'string');

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('teste');
    }
}
