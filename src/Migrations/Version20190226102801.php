<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190226102801 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE choisir DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE choisir ADD Id_choisir INT AUTO_INCREMENT NOT NULL, ADD visualise TINYINT(1) NOT NULL, ADD refuser TINYINT(1) NOT NULL, CHANGE Id_client Id_client INT DEFAULT NULL, CHANGE Id_artisan Id_artisan INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choisir ADD PRIMARY KEY (Id_choisir)');
        $this->addSql('ALTER TABLE choisir RENAME INDEX idx_c25a4ad36382331b TO choisir_client0_FK');
        $this->addSql('ALTER TABLE choisir RENAME INDEX idx_c25a4ad3ada0a073 TO choisir_artisan_FK');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE choisir MODIFY Id_choisir INT NOT NULL');
        $this->addSql('ALTER TABLE choisir DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE choisir DROP Id_choisir, DROP visualise, DROP refuser, CHANGE Id_artisan Id_artisan INT NOT NULL, CHANGE Id_client Id_client INT NOT NULL');
        $this->addSql('ALTER TABLE choisir ADD PRIMARY KEY (Id_client, Id_artisan)');
        $this->addSql('ALTER TABLE choisir RENAME INDEX choisir_artisan_fk TO IDX_C25A4AD3ADA0A073');
        $this->addSql('ALTER TABLE choisir RENAME INDEX choisir_client0_fk TO IDX_C25A4AD36382331B');
    }
}
