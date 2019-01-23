<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190123084220 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE admin (Id_admin INT AUTO_INCREMENT NOT NULL, Mail_admin VARCHAR(100) NOT NULL, Motdepasse_admin VARCHAR(100) NOT NULL, Reinitialisation_mdp_admin TINYINT(1) NOT NULL, PRIMARY KEY(Id_admin)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artisan (Id_artisan INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(100) NOT NULL, Raison_sociale VARCHAR(150) NOT NULL, SIREN VARCHAR(20) NOT NULL, Tel VARCHAR(16) NOT NULL, Mail VARCHAR(100) NOT NULL, Description VARCHAR(250) NOT NULL, Motdepasse VARCHAR(150) NOT NULL, Num_assurance VARCHAR(20) NOT NULL, Date_inscription DATE NOT NULL, Credit INT NOT NULL, Devis_max INT NOT NULL, Disponibilite INT NOT NULL, Date_debut_arret_reception DATETIME NOT NULL, Date_fin_arret_reception DATETIME NOT NULL, Date_fin_engagement DATETIME NOT NULL, Avantage INT NOT NULL, Reinitialisation_mdp_artisan TINYINT(1) NOT NULL, Validation_assurance TINYINT(1) NOT NULL, Validation_artisan TINYINT(1) NOT NULL, Id_formule INT DEFAULT NULL, INDEX artisan_formules_FK (Id_formule), PRIMARY KEY(Id_artisan)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appartient (Id_artisan INT NOT NULL, Id_service INT NOT NULL, INDEX IDX_4201BAA7ADA0A073 (Id_artisan), INDEX IDX_4201BAA7705D3072 (Id_service), PRIMARY KEY(Id_artisan, Id_service)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (Id_client INT AUTO_INCREMENT NOT NULL, Nom_client VARCHAR(100) NOT NULL, Prenom_client VARCHAR(100) NOT NULL, Adresse_intervention VARCHAR(150) NOT NULL, Tel_client VARCHAR(10) NOT NULL, Mail_client VARCHAR(100) NOT NULL, Description_sup VARCHAR(250) NOT NULL, Date_proposition DATETIME NOT NULL, Date_realisation_debut DATETIME NOT NULL, Date_realisation_fin DATETIME NOT NULL, Etat_avancement VARCHAR(250) NOT NULL, Liste_id_artisan VARCHAR(400) NOT NULL, Id_service INT DEFAULT NULL, INDEX client_service_FK (Id_service), PRIMARY KEY(Id_client)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visualise (Id_client INT NOT NULL, Id_artisan INT NOT NULL, INDEX IDX_87151AAE6382331B (Id_client), INDEX IDX_87151AAEADA0A073 (Id_artisan), PRIMARY KEY(Id_client, Id_artisan)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commercial (Id_commercial INT AUTO_INCREMENT NOT NULL, Mail_commercial VARCHAR(100) NOT NULL, Motdepasse_commercial VARCHAR(100) NOT NULL, Reinitialisation_mdp_commercial TINYINT(1) NOT NULL, PRIMARY KEY(Id_commercial)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis (Id_devis INT AUTO_INCREMENT NOT NULL, Nom_devis VARCHAR(100) NOT NULL, Date_envoie DATETIME NOT NULL, Fichier_joint VARCHAR(100) NOT NULL, modifier TINYINT(1) NOT NULL, Id_artisan INT DEFAULT NULL, Id_client INT DEFAULT NULL, INDEX devis_client0_FK (Id_client), INDEX devis_artisan_FK (Id_artisan), PRIMARY KEY(Id_devis)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formules (Id_formule INT AUTO_INCREMENT NOT NULL, Nom_formule VARCHAR(100) NOT NULL, PRIMARY KEY(Id_formule)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parametre (Id_parametre INT AUTO_INCREMENT NOT NULL, Clef VARCHAR(50) NOT NULL, Valeur INT NOT NULL, PRIMARY KEY(Id_parametre)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (Id_service INT AUTO_INCREMENT NOT NULL, Nom_service VARCHAR(250) NOT NULL, PRIMARY KEY(Id_service)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artisan ADD CONSTRAINT FK_3C600AD3F19C3638 FOREIGN KEY (Id_formule) REFERENCES formules (Id_formule)');
        $this->addSql('ALTER TABLE appartient ADD CONSTRAINT FK_4201BAA7ADA0A073 FOREIGN KEY (Id_artisan) REFERENCES artisan (Id_artisan)');
        $this->addSql('ALTER TABLE appartient ADD CONSTRAINT FK_4201BAA7705D3072 FOREIGN KEY (Id_service) REFERENCES service (Id_service)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455705D3072 FOREIGN KEY (Id_service) REFERENCES service (Id_service)');
        $this->addSql('ALTER TABLE visualise ADD CONSTRAINT FK_87151AAE6382331B FOREIGN KEY (Id_client) REFERENCES client (Id_client)');
        $this->addSql('ALTER TABLE visualise ADD CONSTRAINT FK_87151AAEADA0A073 FOREIGN KEY (Id_artisan) REFERENCES artisan (Id_artisan)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BADA0A073 FOREIGN KEY (Id_artisan) REFERENCES artisan (Id_artisan)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B6382331B FOREIGN KEY (Id_client) REFERENCES client (Id_client)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE appartient DROP FOREIGN KEY FK_4201BAA7ADA0A073');
        $this->addSql('ALTER TABLE visualise DROP FOREIGN KEY FK_87151AAEADA0A073');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52BADA0A073');
        $this->addSql('ALTER TABLE visualise DROP FOREIGN KEY FK_87151AAE6382331B');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B6382331B');
        $this->addSql('ALTER TABLE artisan DROP FOREIGN KEY FK_3C600AD3F19C3638');
        $this->addSql('ALTER TABLE appartient DROP FOREIGN KEY FK_4201BAA7705D3072');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455705D3072');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE artisan');
        $this->addSql('DROP TABLE appartient');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE visualise');
        $this->addSql('DROP TABLE commercial');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE formules');
        $this->addSql('DROP TABLE parametre');
        $this->addSql('DROP TABLE service');
    }
}
