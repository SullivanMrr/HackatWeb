<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130102202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenements CHANGE ID_HackaE ID_HackaE INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D79F6B11F1140376 ON participant (Mail)');
        $this->addSql('ALTER TABLE participer CHANGE ID_ParticiP ID_ParticiP INT DEFAULT NULL, CHANGE ID_HackaP ID_HackaP INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenements CHANGE ID_HackaE ID_HackaE INT NOT NULL');
        $this->addSql('DROP INDEX UNIQ_D79F6B11F1140376 ON participant');
        $this->addSql('ALTER TABLE participer CHANGE ID_ParticiP ID_ParticiP INT NOT NULL, CHANGE ID_HackaP ID_HackaP INT NOT NULL');
    }
}
