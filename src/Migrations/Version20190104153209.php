<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190104153209 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY DEVIS_CLIENT0_FK');
        $this->addSql('ALTER TABLE artisan DROP FOREIGN KEY ARTISAN_FORMULES_FK');
        $this->addSql('ALTER TABLE prend DROP FOREIGN KEY SELECTIONNE_HORAIRES_FK');
        $this->addSql('ALTER TABLE selectionne DROP FOREIGN KEY SELECTIONNE_JOURSEMAINE_FK');
        $this->addSql('ALTER TABLE appartient DROP FOREIGN KEY SELECTIONNE_SERVICE_FK');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY CLIENT_SERVICE_FK');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE appartient');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commercial');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE formules');
        $this->addSql('DROP TABLE horaires');
        $this->addSql('DROP TABLE joursemaine');
        $this->addSql('DROP TABLE prend');
        $this->addSql('DROP TABLE selectionne');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP INDEX ARTISAN_FORMULES_FK ON artisan');
        $this->addSql('ALTER TABLE artisan DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE artisan ADD id INT AUTO_INCREMENT NOT NULL, DROP Id_artisan, DROP Motdepasse, DROP Num_assurance, DROP Id_formule, CHANGE Tel tel INT NOT NULL, CHANGE Mail mail VARCHAR(100) NOT NULL, CHANGE Confirmation_mail confirmation_mail VARBINARY(255) NOT NULL, CHANGE Credit credit INT NOT NULL, CHANGE Devis_max devis_max INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artisan ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE admin (Id_admin INT NOT NULL, Mail_admin VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci, Motdepasse_admin VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(Id_admin)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appartient (Id_service INT NOT NULL, Id_artisan INT NOT NULL, INDEX SELECTIONNE_ARTISAN2_FK (Id_artisan), INDEX IDX_4201BAA7705D3072 (Id_service), PRIMARY KEY(Id_service, Id_artisan)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (Id_client INT NOT NULL, Nom_client VARCHAR(50) NOT NULL COLLATE latin1_swedish_ci, Prenom_client VARCHAR(50) NOT NULL COLLATE latin1_swedish_ci, Adresse_intervention VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci, Tel_client VARCHAR(10) NOT NULL COLLATE latin1_swedish_ci, Mail_client VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci, Description_supp VARCHAR(250) NOT NULL COLLATE latin1_swedish_ci, Date_proposition DATE NOT NULL, Date_realisation DATE NOT NULL, Etat_avancement VARCHAR(50) NOT NULL COLLATE latin1_swedish_ci, Id_service INT NOT NULL, INDEX CLIENT_SERVICE_FK (Id_service), PRIMARY KEY(Id_client)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commercial (Id_admin INT NOT NULL, Mail_commercial VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci, Motdepasse_commercial VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(Id_admin)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis (Id_devis INT NOT NULL, Nom_devis VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci, Date_envoi DATE NOT NULL, Id_artisan INT NOT NULL, Id_client INT NOT NULL, INDEX DEVIS_ARTISAN_FK (Id_artisan), INDEX DEVIS_CLIENT0_FK (Id_client), PRIMARY KEY(Id_devis)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formules (Id_formule INT NOT NULL, Nom_formule VARCHAR(50) NOT NULL COLLATE latin1_swedish_ci, Montant_paiement NUMERIC(15, 3) NOT NULL, PRIMARY KEY(Id_formule)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaires (Id_horaire INT NOT NULL, Matin TINYINT(1) NOT NULL, Apresmidi TINYINT(1) NOT NULL, H24 TINYINT(1) NOT NULL, PRIMARY KEY(Id_horaire)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joursemaine (Id_jour INT NOT NULL, Lundi TINYINT(1) NOT NULL, Mardi TINYINT(1) NOT NULL, Mercredi TINYINT(1) NOT NULL, Jeudi TINYINT(1) NOT NULL, Vendredi TINYINT(1) NOT NULL, Samedi TINYINT(1) NOT NULL, Dimanche TINYINT(1) NOT NULL, PRIMARY KEY(Id_jour)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prend (Id_horaire INT NOT NULL, Id_artisan INT NOT NULL, INDEX SELECTIONNE_ARTISAN1_FK (Id_artisan), INDEX IDX_17B95662A089716 (Id_horaire), PRIMARY KEY(Id_horaire, Id_artisan)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE selectionne (Id_jour INT NOT NULL, Id_artisan INT NOT NULL, INDEX SELECTIONNE_ARTISAN0_FK (Id_artisan), INDEX IDX_40B048579E8AFC5B (Id_jour), PRIMARY KEY(Id_jour, Id_artisan)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (Id_service INT NOT NULL, Nom_service VARCHAR(50) NOT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(Id_service)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appartient ADD CONSTRAINT SELECTIONNE_ARTISAN2_FK FOREIGN KEY (Id_artisan) REFERENCES artisan (Id_artisan)');
        $this->addSql('ALTER TABLE appartient ADD CONSTRAINT SELECTIONNE_SERVICE_FK FOREIGN KEY (Id_service) REFERENCES service (Id_service)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT CLIENT_SERVICE_FK FOREIGN KEY (Id_service) REFERENCES service (Id_service)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT DEVIS_ARTISAN_FK FOREIGN KEY (Id_artisan) REFERENCES artisan (Id_artisan)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT DEVIS_CLIENT0_FK FOREIGN KEY (Id_client) REFERENCES client (Id_client)');
        $this->addSql('ALTER TABLE prend ADD CONSTRAINT SELECTIONNE_ARTISAN1_FK FOREIGN KEY (Id_artisan) REFERENCES artisan (Id_artisan)');
        $this->addSql('ALTER TABLE prend ADD CONSTRAINT SELECTIONNE_HORAIRES_FK FOREIGN KEY (Id_horaire) REFERENCES horaires (Id_horaire)');
        $this->addSql('ALTER TABLE selectionne ADD CONSTRAINT SELECTIONNE_ARTISAN0_FK FOREIGN KEY (Id_artisan) REFERENCES artisan (Id_artisan)');
        $this->addSql('ALTER TABLE selectionne ADD CONSTRAINT SELECTIONNE_JOURSEMAINE_FK FOREIGN KEY (Id_jour) REFERENCES joursemaine (Id_jour)');
        $this->addSql('ALTER TABLE artisan MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE artisan DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE artisan ADD Id_artisan INT NOT NULL, ADD Motdepasse VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci, ADD Num_assurance VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, ADD Id_formule INT NOT NULL, DROP id, CHANGE tel Tel VARCHAR(10) NOT NULL COLLATE latin1_swedish_ci, CHANGE mail Mail VARCHAR(50) NOT NULL COLLATE latin1_swedish_ci, CHANGE confirmation_mail Confirmation_mail TINYINT(1) NOT NULL, CHANGE credit Credit DOUBLE PRECISION NOT NULL, CHANGE devis_max Devis_max INT NOT NULL');
        $this->addSql('ALTER TABLE artisan ADD CONSTRAINT ARTISAN_FORMULES_FK FOREIGN KEY (Id_formule) REFERENCES formules (Id_formule)');
        $this->addSql('CREATE INDEX ARTISAN_FORMULES_FK ON artisan (Id_formule)');
        $this->addSql('ALTER TABLE artisan ADD PRIMARY KEY (Id_artisan)');
    }
}
