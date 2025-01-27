<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241126141743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1D987BE75');
        $this->addSql('DROP INDEX IDX_64C19C1D987BE75 ON category');
        $this->addSql('ALTER TABLE category DROP reminder_id');
        $this->addSql('ALTER TABLE reminder CHANGE category_id category_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD reminder_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1D987BE75 FOREIGN KEY (reminder_id) REFERENCES reminder (id)');
        $this->addSql('CREATE INDEX IDX_64C19C1D987BE75 ON category (reminder_id)');
        $this->addSql('ALTER TABLE reminder CHANGE category_id category_id INT NOT NULL');
    }
}
