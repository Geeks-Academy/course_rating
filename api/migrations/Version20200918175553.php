<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200918175553 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, title VARCHAR(45) NOT NULL, author VARCHAR(45) NOT NULL, release_date DATETIME DEFAULT NULL, duration VARCHAR(45) DEFAULT NULL, language VARCHAR(45) DEFAULT NULL, price VARCHAR(45) DEFAULT NULL, repository_url VARCHAR(255) NOT NULL, is_reviewed TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_course_characteristic (course_id INT NOT NULL, course_characteristic_id INT NOT NULL, INDEX IDX_86EE734591CC992 (course_id), INDEX IDX_86EE7347E667728 (course_characteristic_id), PRIMARY KEY(course_id, course_characteristic_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_course_translation (course_id INT NOT NULL, course_translation_id INT NOT NULL, INDEX IDX_59AEABA7591CC992 (course_id), INDEX IDX_59AEABA76366CC11 (course_translation_id), PRIMARY KEY(course_id, course_translation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_course_technology (course_id INT NOT NULL, course_technology_id INT NOT NULL, INDEX IDX_8B0EBACD591CC992 (course_id), INDEX IDX_8B0EBACD81B890BA (course_technology_id), PRIMARY KEY(course_id, course_technology_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_characteristic (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, code VARCHAR(45) NOT NULL, is_enabled TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_rating (id INT AUTO_INCREMENT NOT NULL, course_id INT DEFAULT NULL, username VARCHAR(45) NOT NULL, draft SMALLINT NOT NULL, created_at DATETIME NOT NULL, score VARCHAR(45) NOT NULL, INDEX IDX_76B1E76F591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_rating_criterion (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(45) NOT NULL, code VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_rating_criterion_reference (id INT AUTO_INCREMENT NOT NULL, course_rating_id INT DEFAULT NULL, course_rating_criterion_id INT DEFAULT NULL, rating VARCHAR(255) NOT NULL, INDEX IDX_97D39AD8893AF6A (course_rating_id), INDEX IDX_97D39ADBDF1B03E (course_rating_criterion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_rating_notification_request (id INT AUTO_INCREMENT NOT NULL, course_rating_id INT DEFAULT NULL, username VARCHAR(45) NOT NULL, created_at DATETIME NOT NULL, answered_at DATETIME DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_A6E447638893AF6A (course_rating_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_rating_state (id INT AUTO_INCREMENT NOT NULL, course_rating_id INT NOT NULL, state VARCHAR(100) NOT NULL, INDEX IDX_BF4FA53A8893AF6A (course_rating_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_source (id INT AUTO_INCREMENT NOT NULL, course_id INT DEFAULT NULL, title VARCHAR(45) NOT NULL, url VARCHAR(45) NOT NULL, logo VARCHAR(45) DEFAULT NULL, INDEX IDX_F1B2BE3E591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_technology (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, logo VARCHAR(45) DEFAULT NULL, code VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_translation (id INT AUTO_INCREMENT NOT NULL, language VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_rating (id INT AUTO_INCREMENT NOT NULL, course_rating_id INT DEFAULT NULL, username VARCHAR(45) NOT NULL, weight VARCHAR(45) NOT NULL, rating VARCHAR(45) NOT NULL, comment VARCHAR(45) NOT NULL, INDEX IDX_BDDB3D1F8893AF6A (course_rating_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_votes (id INT AUTO_INCREMENT NOT NULL, course_rating_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, vote TINYTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\', created_at DATETIME NOT NULL, reason LONGTEXT NOT NULL, enabled SMALLINT NOT NULL, course_ratings_id INT NOT NULL, INDEX IDX_B34981978893AF6A (course_rating_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course_course_characteristic ADD CONSTRAINT FK_86EE734591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_course_characteristic ADD CONSTRAINT FK_86EE7347E667728 FOREIGN KEY (course_characteristic_id) REFERENCES course_characteristic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_course_translation ADD CONSTRAINT FK_59AEABA7591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_course_translation ADD CONSTRAINT FK_59AEABA76366CC11 FOREIGN KEY (course_translation_id) REFERENCES course_translation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_course_technology ADD CONSTRAINT FK_8B0EBACD591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_course_technology ADD CONSTRAINT FK_8B0EBACD81B890BA FOREIGN KEY (course_technology_id) REFERENCES course_technology (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_rating ADD CONSTRAINT FK_76B1E76F591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE course_rating_criterion_reference ADD CONSTRAINT FK_97D39AD8893AF6A FOREIGN KEY (course_rating_id) REFERENCES course_rating (id)');
        $this->addSql('ALTER TABLE course_rating_criterion_reference ADD CONSTRAINT FK_97D39ADBDF1B03E FOREIGN KEY (course_rating_criterion_id) REFERENCES course_rating_criterion (id)');
        $this->addSql('ALTER TABLE course_rating_notification_request ADD CONSTRAINT FK_A6E447638893AF6A FOREIGN KEY (course_rating_id) REFERENCES course_rating (id)');
        $this->addSql('ALTER TABLE course_rating_state ADD CONSTRAINT FK_BF4FA53A8893AF6A FOREIGN KEY (course_rating_id) REFERENCES course_rating (id)');
        $this->addSql('ALTER TABLE course_source ADD CONSTRAINT FK_F1B2BE3E591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE user_rating ADD CONSTRAINT FK_BDDB3D1F8893AF6A FOREIGN KEY (course_rating_id) REFERENCES course_rating (id)');
        $this->addSql('ALTER TABLE user_votes ADD CONSTRAINT FK_B34981978893AF6A FOREIGN KEY (course_rating_id) REFERENCES course_rating (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course_course_characteristic DROP FOREIGN KEY FK_86EE734591CC992');
        $this->addSql('ALTER TABLE course_course_translation DROP FOREIGN KEY FK_59AEABA7591CC992');
        $this->addSql('ALTER TABLE course_course_technology DROP FOREIGN KEY FK_8B0EBACD591CC992');
        $this->addSql('ALTER TABLE course_rating DROP FOREIGN KEY FK_76B1E76F591CC992');
        $this->addSql('ALTER TABLE course_source DROP FOREIGN KEY FK_F1B2BE3E591CC992');
        $this->addSql('ALTER TABLE course_course_characteristic DROP FOREIGN KEY FK_86EE7347E667728');
        $this->addSql('ALTER TABLE course_rating_criterion_reference DROP FOREIGN KEY FK_97D39AD8893AF6A');
        $this->addSql('ALTER TABLE course_rating_notification_request DROP FOREIGN KEY FK_A6E447638893AF6A');
        $this->addSql('ALTER TABLE course_rating_state DROP FOREIGN KEY FK_BF4FA53A8893AF6A');
        $this->addSql('ALTER TABLE user_rating DROP FOREIGN KEY FK_BDDB3D1F8893AF6A');
        $this->addSql('ALTER TABLE user_votes DROP FOREIGN KEY FK_B34981978893AF6A');
        $this->addSql('ALTER TABLE course_rating_criterion_reference DROP FOREIGN KEY FK_97D39ADBDF1B03E');
        $this->addSql('ALTER TABLE course_course_technology DROP FOREIGN KEY FK_8B0EBACD81B890BA');
        $this->addSql('ALTER TABLE course_course_translation DROP FOREIGN KEY FK_59AEABA76366CC11');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_course_characteristic');
        $this->addSql('DROP TABLE course_course_translation');
        $this->addSql('DROP TABLE course_course_technology');
        $this->addSql('DROP TABLE course_characteristic');
        $this->addSql('DROP TABLE course_rating');
        $this->addSql('DROP TABLE course_rating_criterion');
        $this->addSql('DROP TABLE course_rating_criterion_reference');
        $this->addSql('DROP TABLE course_rating_notification_request');
        $this->addSql('DROP TABLE course_rating_state');
        $this->addSql('DROP TABLE course_source');
        $this->addSql('DROP TABLE course_technology');
        $this->addSql('DROP TABLE course_translation');
        $this->addSql('DROP TABLE user_rating');
        $this->addSql('DROP TABLE user_votes');
    }
}
