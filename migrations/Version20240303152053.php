<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240303152053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, habitat_id INT DEFAULT NULL, zoo_id INT DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, race VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', image_name VARCHAR(255) DEFAULT NULL, INDEX IDX_6AAB231FAFFE2D26 (habitat_id), INDEX IDX_6AAB231FFA5C94EF (zoo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, zoo_id INT DEFAULT NULL, pseudo VARCHAR(255) DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, note INT DEFAULT NULL, is_visible TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_8F91ABF0FA5C94EF (zoo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, habitat_id INT DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_67F068BCAFFE2D26 (habitat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitat (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaire (id INT AUTO_INCREMENT NOT NULL, jour VARCHAR(255) DEFAULT NULL, ouverture TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', fermeture TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', horaire_ouverture TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', horaire_fermuture TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', ouvert TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_animal (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, etat VARCHAR(255) DEFAULT NULL, details VARCHAR(255) DEFAULT NULL, grammage INT DEFAULT NULL, created_at DATETIME DEFAULT NULL, INDEX IDX_EC1BD60F8E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nourriture (id INT AUTO_INCREMENT NOT NULL, information_animal_id INT DEFAULT NULL, repas_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_7447E613301A2994 (information_animal_id), INDEX IDX_7447E6131D236AAA (repas_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repas (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, quantite INT DEFAULT NULL, date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_A8D351B38E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, zoo_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_E19D9AD2FA5C94EF (zoo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, zoo_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D649FA5C94EF (zoo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zoo (id INT AUTO_INCREMENT NOT NULL, uuid CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FFA5C94EF FOREIGN KEY (zoo_id) REFERENCES zoo (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0FA5C94EF FOREIGN KEY (zoo_id) REFERENCES zoo (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE information_animal ADD CONSTRAINT FK_EC1BD60F8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE nourriture ADD CONSTRAINT FK_7447E613301A2994 FOREIGN KEY (information_animal_id) REFERENCES information_animal (id)');
        $this->addSql('ALTER TABLE nourriture ADD CONSTRAINT FK_7447E6131D236AAA FOREIGN KEY (repas_id) REFERENCES repas (id)');
        $this->addSql('ALTER TABLE repas ADD CONSTRAINT FK_A8D351B38E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2FA5C94EF FOREIGN KEY (zoo_id) REFERENCES zoo (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FA5C94EF FOREIGN KEY (zoo_id) REFERENCES zoo (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FAFFE2D26');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FFA5C94EF');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0FA5C94EF');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCAFFE2D26');
        $this->addSql('ALTER TABLE information_animal DROP FOREIGN KEY FK_EC1BD60F8E962C16');
        $this->addSql('ALTER TABLE nourriture DROP FOREIGN KEY FK_7447E613301A2994');
        $this->addSql('ALTER TABLE nourriture DROP FOREIGN KEY FK_7447E6131D236AAA');
        $this->addSql('ALTER TABLE repas DROP FOREIGN KEY FK_A8D351B38E962C16');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2FA5C94EF');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FA5C94EF');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE habitat');
        $this->addSql('DROP TABLE horaire');
        $this->addSql('DROP TABLE information_animal');
        $this->addSql('DROP TABLE nourriture');
        $this->addSql('DROP TABLE repas');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE zoo');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
