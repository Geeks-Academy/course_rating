<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201129162133 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course_course_category (course_id INT NOT NULL, course_category_id INT NOT NULL, INDEX IDX_8EB34CC5591CC992 (course_id), INDEX IDX_8EB34CC56628AD36 (course_category_id), PRIMARY KEY(course_id, course_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_area (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_area_course (course_area_id INT NOT NULL, course_id INT NOT NULL, INDEX IDX_47BAEEFB5CC4570 (course_area_id), INDEX IDX_47BAEEF591CC992 (course_id), PRIMARY KEY(course_area_id, course_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_area_course_technology (course_area_id INT NOT NULL, course_technology_id INT NOT NULL, INDEX IDX_62C89CC4B5CC4570 (course_area_id), INDEX IDX_62C89CC481B890BA (course_technology_id), PRIMARY KEY(course_area_id, course_technology_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_level (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course_course_category ADD CONSTRAINT FK_8EB34CC5591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_course_category ADD CONSTRAINT FK_8EB34CC56628AD36 FOREIGN KEY (course_category_id) REFERENCES course_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_area_course ADD CONSTRAINT FK_47BAEEFB5CC4570 FOREIGN KEY (course_area_id) REFERENCES course_area (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_area_course ADD CONSTRAINT FK_47BAEEF591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_area_course_technology ADD CONSTRAINT FK_62C89CC4B5CC4570 FOREIGN KEY (course_area_id) REFERENCES course_area (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_area_course_technology ADD CONSTRAINT FK_62C89CC481B890BA FOREIGN KEY (course_technology_id) REFERENCES course_technology (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course ADD level_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB95FB14BA7 FOREIGN KEY (level_id) REFERENCES course_level (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB95FB14BA7 ON course (level_id)');
        $this->addSql('ALTER TABLE course_characteristic ADD counterpart_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE course_characteristic ADD CONSTRAINT FK_ADE34E64606374F2 FOREIGN KEY (counterpart_id) REFERENCES course_characteristic (id) ON DELETE SET NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ADE34E64606374F2 ON course_characteristic (counterpart_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course_area_course DROP FOREIGN KEY FK_47BAEEFB5CC4570');
        $this->addSql('ALTER TABLE course_area_course_technology DROP FOREIGN KEY FK_62C89CC4B5CC4570');
        $this->addSql('ALTER TABLE course_course_category DROP FOREIGN KEY FK_8EB34CC56628AD36');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB95FB14BA7');
        $this->addSql('DROP TABLE course_course_category');
        $this->addSql('DROP TABLE course_area');
        $this->addSql('DROP TABLE course_area_course');
        $this->addSql('DROP TABLE course_area_course_technology');
        $this->addSql('DROP TABLE course_category');
        $this->addSql('DROP TABLE course_level');
        $this->addSql('DROP INDEX IDX_169E6FB95FB14BA7 ON course');
        $this->addSql('ALTER TABLE course DROP level_id');
        $this->addSql('ALTER TABLE course_characteristic DROP FOREIGN KEY FK_ADE34E64606374F2');
        $this->addSql('DROP INDEX UNIQ_ADE34E64606374F2 ON course_characteristic');
        $this->addSql('ALTER TABLE course_characteristic DROP counterpart_id');
    }
}
