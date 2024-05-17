<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240507114532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lampe ADD CONSTRAINT FK_4B924965DA18ED68 FOREIGN KEY (type_lampe_id) REFERENCES type_lampe (id)');
        $this->addSql('CREATE INDEX IDX_4B924965DA18ED68 ON lampe (type_lampe_id)');
        $this->addSql('ALTER TABLE type_lampe DROP FOREIGN KEY FK_459ECE9225DD318D');
        $this->addSql('DROP INDEX IDX_459ECE9225DD318D ON type_lampe');
        $this->addSql('ALTER TABLE type_lampe ADD libelle VARCHAR(50) NOT NULL, DROP libelle_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lampe DROP FOREIGN KEY FK_4B924965DA18ED68');
        $this->addSql('DROP INDEX IDX_4B924965DA18ED68 ON lampe');
        $this->addSql('ALTER TABLE type_lampe ADD libelle_id INT NOT NULL, DROP libelle');
        $this->addSql('ALTER TABLE type_lampe ADD CONSTRAINT FK_459ECE9225DD318D FOREIGN KEY (libelle_id) REFERENCES lampe (id)');
        $this->addSql('CREATE INDEX IDX_459ECE9225DD318D ON type_lampe (libelle_id)');
    }
}
