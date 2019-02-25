<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190225112021 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE financial_transactions DROP FOREIGN KEY FK_1353F2D9CE062FF9');
        $this->addSql('ALTER TABLE credits DROP FOREIGN KEY FK_4117D17E8789B572');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE8789B572');
        $this->addSql('ALTER TABLE payments DROP FOREIGN KEY FK_65D29B328789B572');
        $this->addSql('ALTER TABLE credits DROP FOREIGN KEY FK_4117D17E4C3A3BB');
        $this->addSql('ALTER TABLE financial_transactions DROP FOREIGN KEY FK_1353F2D94C3A3BB');
        $this->addSql('CREATE TABLE superadmin (Id_super_admin INT AUTO_INCREMENT NOT NULL, Mail_super_admin VARCHAR(100) NOT NULL, Mot_de_passe_super_admin VARCHAR(100) NOT NULL, PRIMARY KEY(Id_super_admin)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE credits');
        $this->addSql('DROP TABLE financial_transactions');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE payment_instructions');
        $this->addSql('DROP TABLE payments');
        $this->addSql('ALTER TABLE admin ADD roles JSON NOT NULL');
        $this->addSql('ALTER TABLE artisan ADD roles JSON NOT NULL, ADD Id_commercial_service_commercial INT DEFAULT NULL, DROP Validation_assurance, DROP Validation_artisan, CHANGE Motdepasse Motdepasse VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE artisan ADD CONSTRAINT FK_3C600AD3D3540719 FOREIGN KEY (Id_commercial_service_commercial) REFERENCES service_commercial (Id_commercial)');
        $this->addSql('CREATE INDEX IDX_3C600AD3D3540719 ON artisan (Id_commercial_service_commercial)');
        $this->addSql('ALTER TABLE devis DROP Nom_devis, CHANGE Fichier_joint Fichier_joint VARCHAR(200) NOT NULL');
        $this->addSql('ALTER TABLE parametre ADD Prix_un_credit DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE reinitialisation_mdp CHANGE Token Token VARCHAR(44) NOT NULL');
        $this->addSql('ALTER TABLE service_commercial ADD roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE credits (id INT AUTO_INCREMENT NOT NULL, payment_instruction_id INT DEFAULT NULL, payment_id INT DEFAULT NULL, INDEX IDX_4117D17E4C3A3BB (payment_id), INDEX IDX_4117D17E8789B572 (payment_instruction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE financial_transactions (id INT AUTO_INCREMENT NOT NULL, credit_id INT DEFAULT NULL, payment_id INT DEFAULT NULL, INDEX IDX_1353F2D94C3A3BB (payment_id), INDEX IDX_1353F2D9CE062FF9 (credit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, payment_instruction_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_E52FFDEE8789B572 (payment_instruction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE payment_instructions (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE payments (id INT AUTO_INCREMENT NOT NULL, payment_instruction_id INT NOT NULL, INDEX IDX_65D29B328789B572 (payment_instruction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE credits ADD CONSTRAINT FK_4117D17E4C3A3BB FOREIGN KEY (payment_id) REFERENCES payments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE credits ADD CONSTRAINT FK_4117D17E8789B572 FOREIGN KEY (payment_instruction_id) REFERENCES payment_instructions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE financial_transactions ADD CONSTRAINT FK_1353F2D94C3A3BB FOREIGN KEY (payment_id) REFERENCES payments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE financial_transactions ADD CONSTRAINT FK_1353F2D9CE062FF9 FOREIGN KEY (credit_id) REFERENCES credits (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE8789B572 FOREIGN KEY (payment_instruction_id) REFERENCES payment_instructions (id)');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B328789B572 FOREIGN KEY (payment_instruction_id) REFERENCES payment_instructions (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE superadmin');
        $this->addSql('ALTER TABLE admin DROP roles');
        $this->addSql('ALTER TABLE artisan DROP FOREIGN KEY FK_3C600AD3D3540719');
        $this->addSql('DROP INDEX IDX_3C600AD3D3540719 ON artisan');
        $this->addSql('ALTER TABLE artisan ADD Validation_assurance TINYINT(1) NOT NULL, ADD Validation_artisan TINYINT(1) NOT NULL, DROP roles, DROP Id_commercial_service_commercial, CHANGE Motdepasse Motdepasse VARCHAR(50) NOT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE devis ADD Nom_devis VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci, CHANGE Fichier_joint Fichier_joint VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE parametre DROP Prix_un_credit');
        $this->addSql('ALTER TABLE reinitialisation_mdp CHANGE Token Token VARCHAR(21) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE service_commercial DROP roles');
    }
}
