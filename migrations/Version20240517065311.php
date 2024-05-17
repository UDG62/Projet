<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240517065311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ajouter (id INT AUTO_INCREMENT NOT NULL, lampe_id INT NOT NULL, quantite INT NOT NULL, INDEX IDX_AB384B5F17E7CA94 (lampe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, panier_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_24CC0DF2F77D927C (panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ajouter ADD CONSTRAINT FK_AB384B5F17E7CA94 FOREIGN KEY (lampe_id) REFERENCES lampe (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2F77D927C FOREIGN KEY (panier_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ajouter DROP FOREIGN KEY FK_AB384B5F17E7CA94');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2F77D927C');
        $this->addSql('DROP TABLE ajouter');
        $this->addSql('DROP TABLE panier');
    }
}
