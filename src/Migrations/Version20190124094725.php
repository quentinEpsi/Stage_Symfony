<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190124094725 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE artisan CHANGE Id_formule Id_formule INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artisan ADD CONSTRAINT FK_3C600AD3F19C3638 FOREIGN KEY (Id_formule) REFERENCES formules (Id_formule)');
        $this->addSql('ALTER TABLE appartient RENAME INDEX appartient_service0_fk TO IDX_4201BAA7705D3072');
        $this->addSql('ALTER TABLE client CHANGE Id_service Id_service INT DEFAULT NULL');
        $this->addSql('ALTER TABLE visualise DROP visualiser, DROP activer');
        $this->addSql('ALTER TABLE visualise RENAME INDEX visualise_artisan0_fk TO IDX_87151AAEADA0A073');
        $this->addSql('ALTER TABLE devis CHANGE Id_artisan Id_artisan INT DEFAULT NULL, CHANGE Id_client Id_client INT DEFAULT NULL');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B6382331B FOREIGN KEY (Id_client) REFERENCES client (Id_client)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE appartient RENAME INDEX idx_4201baa7705d3072 TO appartient_service0_FK');
        $this->addSql('ALTER TABLE artisan DROP FOREIGN KEY FK_3C600AD3F19C3638');
        $this->addSql('ALTER TABLE artisan CHANGE Id_formule Id_formule INT NOT NULL');
        $this->addSql('ALTER TABLE client CHANGE Id_service Id_service INT NOT NULL');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B6382331B');
        $this->addSql('ALTER TABLE devis CHANGE Id_artisan Id_artisan INT NOT NULL, CHANGE Id_client Id_client INT NOT NULL');
        $this->addSql('ALTER TABLE visualise ADD visualiser TINYINT(1) NOT NULL, ADD activer TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE visualise RENAME INDEX idx_87151aaeada0a073 TO visualise_artisan0_FK');
    }
}
