<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230415224648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD assmat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493F2BB41C FOREIGN KEY (assmat_id) REFERENCES ass_mat (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6493F2BB41C ON user (assmat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493F2BB41C');
        $this->addSql('DROP INDEX IDX_8D93D6493F2BB41C ON user');
        $this->addSql('ALTER TABLE user DROP assmat_id');
    }
}
