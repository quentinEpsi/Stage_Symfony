<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190227112754 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE artisan ADD CONSTRAINT FK_3C600AD3F19C3638 FOREIGN KEY (Id_formule) REFERENCES formules (Id_formule)');
        $this->addSql('ALTER TABLE artisan ADD CONSTRAINT FK_3C600AD360A7388C FOREIGN KEY (Id_commercial) REFERENCES service_commercial (Id_commercial)');
        $this->addSql('ALTER TABLE artisan ADD CONSTRAINT FK_3C600AD3D3540719 FOREIGN KEY (Id_commercial_service_commercial) REFERENCES service_commercial (Id_commercial)');
        $this->addSql('ALTER TABLE etre_dispo ADD CONSTRAINT FK_3D31C024ADA0A073 FOREIGN KEY (Id_artisan) REFERENCES artisan (Id_artisan)');
        $this->addSql('ALTER TABLE etre_dispo ADD CONSTRAINT FK_3D31C0242A089716 FOREIGN KEY (Id_horaire) REFERENCES jour (Id_horaire)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15ADA0A073 FOREIGN KEY (Id_artisan) REFERENCES artisan (Id_artisan)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15705D3072 FOREIGN KEY (Id_service) REFERENCES service (Id_service)');
        $this->addSql('ALTER TABLE choisir ADD CONSTRAINT FK_C25A4AD3ADA0A073 FOREIGN KEY (Id_artisan) REFERENCES artisan (Id_artisan)');
        $this->addSql('ALTER TABLE choisir ADD CONSTRAINT FK_C25A4AD36382331B FOREIGN KEY (Id_client) REFERENCES client (Id_client)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455707E3D87 FOREIGN KEY (Id_etat_avancement) REFERENCES etat_avancement (Id_etat_avancement)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455705D3072 FOREIGN KEY (Id_service) REFERENCES service (Id_service)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BADA0A073 FOREIGN KEY (Id_artisan) REFERENCES artisan (Id_artisan)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B6382331B FOREIGN KEY (Id_client) REFERENCES client (Id_client)');
        $this->addSql('ALTER TABLE reinitialisation_mdp ADD CONSTRAINT FK_D0E4C911ADA0A073 FOREIGN KEY (Id_artisan) REFERENCES artisan (Id_artisan)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE artisan DROP FOREIGN KEY FK_3C600AD3F19C3638');
        $this->addSql('ALTER TABLE artisan DROP FOREIGN KEY FK_3C600AD360A7388C');
        $this->addSql('ALTER TABLE artisan DROP FOREIGN KEY FK_3C600AD3D3540719');
        $this->addSql('ALTER TABLE choisir DROP FOREIGN KEY FK_C25A4AD3ADA0A073');
        $this->addSql('ALTER TABLE choisir DROP FOREIGN KEY FK_C25A4AD36382331B');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455707E3D87');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455705D3072');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52BADA0A073');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B6382331B');
        $this->addSql('ALTER TABLE etre_dispo DROP FOREIGN KEY FK_3D31C024ADA0A073');
        $this->addSql('ALTER TABLE etre_dispo DROP FOREIGN KEY FK_3D31C0242A089716');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15ADA0A073');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15705D3072');
        $this->addSql('ALTER TABLE reinitialisation_mdp DROP FOREIGN KEY FK_D0E4C911ADA0A073');
    }
}
