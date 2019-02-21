<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190221155200 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE superadmin (Id_super_admin INT AUTO_INCREMENT NOT NULL, Mail_super_admin VARCHAR(100) NOT NULL, Mot_de_passe_super_admin VARCHAR(100) NOT NULL, PRIMARY KEY(Id_super_admin)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin ADD roles JSON NOT NULL');
        $this->addSql('ALTER TABLE artisan ADD roles JSON NOT NULL, ADD Id_commercial_service_commercial INT DEFAULT NULL, DROP Validation_assurance, DROP Validation_artisan, CHANGE Motdepasse Motdepasse VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE artisan ADD CONSTRAINT FK_3C600AD3D3540719 FOREIGN KEY (Id_commercial_service_commercial) REFERENCES service_commercial (Id_commercial)');
        $this->addSql('CREATE INDEX IDX_3C600AD3D3540719 ON artisan (Id_commercial_service_commercial)');
        $this->addSql('ALTER TABLE devis DROP Nom_devis, CHANGE Fichier_joint Fichier_joint VARCHAR(200) NOT NULL');
        $this->addSql('ALTER TABLE parametre ADD Prix_un_credit DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE service_commercial ADD roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE superadmin');
        $this->addSql('ALTER TABLE admin DROP roles');
        $this->addSql('ALTER TABLE artisan DROP FOREIGN KEY FK_3C600AD3D3540719');
        $this->addSql('DROP INDEX IDX_3C600AD3D3540719 ON artisan');
        $this->addSql('ALTER TABLE artisan ADD Validation_assurance TINYINT(1) NOT NULL, ADD Validation_artisan TINYINT(1) NOT NULL, DROP roles, DROP Id_commercial_service_commercial, CHANGE Motdepasse Motdepasse VARCHAR(50) NOT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE devis ADD Nom_devis VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci, CHANGE Fichier_joint Fichier_joint VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE parametre DROP Prix_un_credit');
        $this->addSql('ALTER TABLE service_commercial DROP roles');
    }
}
