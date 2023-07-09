<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230709231218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE startup DROP FOREIGN KEY FK_E48E50F6D4E271E1');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, description VARCHAR(200) NOT NULL, image VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEFBA40DB7E');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F67B339C5');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FDAC5BE2B');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9E813F933');
        $this->addSql('DROP TABLE paragraphe');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE user_account');
        $this->addSql('ALTER TABLE entreprise ADD roles JSON NOT NULL, ADD nom_entreprise VARCHAR(100) NOT NULL, ADD situation_geographique VARCHAR(100) NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE addresse addresse VARCHAR(70) NOT NULL, CHANGE type_service type_service VARCHAR(100) NOT NULL, CHANGE date_creation date_creation DATE NOT NULL, CHANGE raison_social password VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D19FA60E7927C74 ON entreprise (email)');
        $this->addSql('ALTER TABLE publicite DROP FOREIGN KEY FK_1D394E39A4AEAFEA');
        $this->addSql('DROP INDEX IDX_1D394E39A4AEAFEA ON publicite');
        $this->addSql('ALTER TABLE publicite DROP entreprise_id, CHANGE image image VARCHAR(200) NOT NULL, CHANGE description description VARCHAR(200) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_E48E50F6D4E271E1 ON startup');
        $this->addSql('ALTER TABLE startup ADD nom VARCHAR(70) NOT NULL, DROP projet_id_id, DROP email, DROP nom_startup');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE available_at available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE paragraphe (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, paragraphe_id_id INT NOT NULL, libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_2D737AEFBA40DB7E (paragraphe_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, startup_id INT NOT NULL, entreprise_id_id INT NOT NULL, source VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, destination VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_B6BD307F67B339C5 (startup_id), INDEX IDX_B6BD307FDAC5BE2B (entreprise_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, section_id_id INT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_50159CA9E813F933 (section_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_account (id INT AUTO_INCREMENT NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, identifiant VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEFBA40DB7E FOREIGN KEY (paragraphe_id_id) REFERENCES paragraphe (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F67B339C5 FOREIGN KEY (startup_id) REFERENCES startup (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FDAC5BE2B FOREIGN KEY (entreprise_id_id) REFERENCES entreprise (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9E813F933 FOREIGN KEY (section_id_id) REFERENCES section (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE startup ADD projet_id_id INT NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD nom_startup VARCHAR(255) NOT NULL, DROP nom');
        $this->addSql('ALTER TABLE startup ADD CONSTRAINT FK_E48E50F6D4E271E1 FOREIGN KEY (projet_id_id) REFERENCES projet (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E48E50F6D4E271E1 ON startup (projet_id_id)');
        $this->addSql('DROP INDEX UNIQ_D19FA60E7927C74 ON entreprise');
        $this->addSql('ALTER TABLE entreprise DROP roles, DROP nom_entreprise, DROP situation_geographique, CHANGE email email VARCHAR(255) NOT NULL, CHANGE addresse addresse VARCHAR(255) NOT NULL, CHANGE type_service type_service VARCHAR(255) NOT NULL, CHANGE date_creation date_creation VARCHAR(255) NOT NULL, CHANGE password raison_social VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE publicite ADD entreprise_id INT NOT NULL, CHANGE image image VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE publicite ADD CONSTRAINT FK_1D394E39A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1D394E39A4AEAFEA ON publicite (entreprise_id)');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL, CHANGE available_at available_at DATETIME NOT NULL, CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }
}
