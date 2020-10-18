<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201013040230 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mensajero (id INT AUTO_INCREMENT NOT NULL, cedula VARCHAR(20) DEFAULT NULL, nombre VARCHAR(20) DEFAULT NULL, apellido VARCHAR(20) DEFAULT NULL, email VARCHAR(30) DEFAULT NULL, telefono VARCHAR(15) DEFAULT NULL, tipo_vehiculo VARCHAR(150) DEFAULT NULL, descripcion_vehiculo VARCHAR(450) DEFAULT NULL, placa VARCHAR(10) DEFAULT NULL, color VARCHAR(20) DEFAULT NULL, status VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ruta ADD mensajero_id INT NOT NULL');
        $this->addSql('ALTER TABLE ruta ADD CONSTRAINT FK_C3AEF08CF8423F9F FOREIGN KEY (mensajero_id) REFERENCES mensajero (id)');
        $this->addSql('CREATE INDEX IDX_C3AEF08CF8423F9F ON ruta (mensajero_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ruta DROP FOREIGN KEY FK_C3AEF08CF8423F9F');
        $this->addSql('DROP TABLE mensajero');
        $this->addSql('DROP INDEX IDX_C3AEF08CF8423F9F ON ruta');
        $this->addSql('ALTER TABLE ruta DROP mensajero_id');
    }
}
