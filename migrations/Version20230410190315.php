<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230410190315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE code ADD id_assmat_id INT DEFAULT NULL, DROP id_assmat');
        $this->addSql('ALTER TABLE code ADD CONSTRAINT FK_77153098BF1E083B FOREIGN KEY (id_assmat_id) REFERENCES ass_mat (id)');
        $this->addSql('CREATE INDEX IDX_77153098BF1E083B ON code (id_assmat_id)');
        $this->addSql('ALTER TABLE user ADD ass_mat_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498EA69E95 FOREIGN KEY (ass_mat_id) REFERENCES ass_mat (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6498EA69E95 ON user (ass_mat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE code DROP FOREIGN KEY FK_77153098BF1E083B');
        $this->addSql('DROP INDEX IDX_77153098BF1E083B ON code');
        $this->addSql('ALTER TABLE code ADD id_assmat INT NOT NULL, DROP id_assmat_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498EA69E95');
        $this->addSql('DROP INDEX IDX_8D93D6498EA69E95 ON user');
        $this->addSql('ALTER TABLE user DROP ass_mat_id');
    }
}
