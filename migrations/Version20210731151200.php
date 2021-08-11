<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210731151200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient ADD chambre_id INT DEFAULT NULL, ADD salle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB9B177F54 FOREIGN KEY (chambre_id) REFERENCES chambre (id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EB9B177F54 ON patient (chambre_id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EBDC304035 ON patient (salle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB9B177F54');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBDC304035');
        $this->addSql('DROP INDEX IDX_1ADAD7EB9B177F54 ON patient');
        $this->addSql('DROP INDEX IDX_1ADAD7EBDC304035 ON patient');
        $this->addSql('ALTER TABLE patient DROP chambre_id, DROP salle_id');
    }
}
