<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210227154944 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE transaction ADD compte_depot_id INT DEFAULT NULL, ADD compte_retrait_id INT DEFAULT NULL, ADD client_depot_id INT DEFAULT NULL, ADD client_retrait_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D17A04723 FOREIGN KEY (compte_depot_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1B6EC9AC4 FOREIGN KEY (compte_retrait_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1ABF6E41B FOREIGN KEY (client_depot_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1EEAC783B FOREIGN KEY (client_retrait_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_723705D17A04723 ON transaction (compte_depot_id)');
        $this->addSql('CREATE INDEX IDX_723705D1B6EC9AC4 ON transaction (compte_retrait_id)');
        $this->addSql('CREATE INDEX IDX_723705D1ABF6E41B ON transaction (client_depot_id)');
        $this->addSql('CREATE INDEX IDX_723705D1EEAC783B ON transaction (client_retrait_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D17A04723');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1B6EC9AC4');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1ABF6E41B');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1EEAC783B');
        $this->addSql('DROP INDEX IDX_723705D17A04723 ON transaction');
        $this->addSql('DROP INDEX IDX_723705D1B6EC9AC4 ON transaction');
        $this->addSql('DROP INDEX IDX_723705D1ABF6E41B ON transaction');
        $this->addSql('DROP INDEX IDX_723705D1EEAC783B ON transaction');
        $this->addSql('ALTER TABLE transaction DROP compte_depot_id, DROP compte_retrait_id, DROP client_depot_id, DROP client_retrait_id');
    }
}
