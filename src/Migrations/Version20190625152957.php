<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190625152957 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit ADD image1 VARCHAR(255) NOT NULL, ADD image2 VARCHAR(255) DEFAULT NULL, ADD image3 VARCHAR(255) DEFAULT NULL, ADD image4 VARCHAR(255) DEFAULT NULL, ADD image5 VARCHAR(255) DEFAULT NULL, ADD image6 VARCHAR(255) DEFAULT NULL, ADD image7 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE firstname firstname VARCHAR(10) NOT NULL, CHANGE lastname lastname VARCHAR(50) NOT NULL, CHANGE email email VARCHAR(80) NOT NULL, CHANGE company company VARCHAR(100) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4C62E638E7927C74 ON contact (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_4C62E638E7927C74 ON contact');
        $this->addSql('ALTER TABLE contact CHANGE firstname firstname VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE lastname lastname VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE company company VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE produit DROP image1, DROP image2, DROP image3, DROP image4, DROP image5, DROP image6, DROP image7');
    }
}
