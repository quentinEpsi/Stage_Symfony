<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190212095557 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client CHANGE Id_service Id_service INT DEFAULT NULL');
        $this->addSql('ALTER TABLE choisir DROP visualiser, DROP refuser');
        $this->addSql('ALTER TABLE choisir RENAME INDEX choisir_artisan0_fk TO IDX_C25A4AD3ADA0A073');
        $this->addSql('ALTER TABLE artisan CHANGE Id_formule Id_formule INT DEFAULT NULL, CHANGE Id_commercial Id_commercial INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etre_dispo RENAME INDEX etre_dispo_jour0_fk TO IDX_3D31C0242A089716');
        $this->addSql('ALTER TABLE proposer RENAME INDEX proposer_service0_fk TO IDX_21866C15705D3072');
        $this->addSql('ALTER TABLE admin CHANGE Id_admin Id_admin INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE devis CHANGE Id_artisan Id_artisan INT DEFAULT NULL, CHANGE Id_client Id_client INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admin CHANGE Id_admin Id_admin INT NOT NULL');
        $this->addSql('ALTER TABLE artisan CHANGE Id_formule Id_formule INT NOT NULL, CHANGE Id_commercial Id_commercial INT NOT NULL');
        $this->addSql('ALTER TABLE choisir ADD visualiser TINYINT(1) NOT NULL, ADD refuser TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE choisir RENAME INDEX idx_c25a4ad3ada0a073 TO choisir_artisan0_FK');
        $this->addSql('ALTER TABLE client CHANGE Id_service Id_service INT NOT NULL');
        $this->addSql('ALTER TABLE devis CHANGE Id_artisan Id_artisan INT NOT NULL, CHANGE Id_client Id_client INT NOT NULL');
        $this->addSql('ALTER TABLE etre_dispo RENAME INDEX idx_3d31c0242a089716 TO etre_dispo_jour0_FK');
        $this->addSql('ALTER TABLE proposer RENAME INDEX idx_21866c15705d3072 TO proposer_service0_FK');
    }
}
