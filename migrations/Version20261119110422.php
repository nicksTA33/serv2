<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261119110422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE vehicle_category (
              id INT AUTO_INCREMENT NOT NULL,
              PRIMARY KEY (id)
            ) DEFAULT CHARACTER SET utf8mb4
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE vehicle (
              id INT AUTO_INCREMENT NOT NULL,
              LicensePlate VARCHAR(8) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`,
              VIN VARCHAR(17) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`,
              Color VARCHAR(7) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`,
              Make VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`,
              Model VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`,
              PriceOfKm FLOAT NOT NULL,
              ImageName VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`,
              type VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`,
              PRIMARY KEY (id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = ''
        SQL);
        $this->addSql('ALTER TABLE vehicleview DROP FOREIGN KEY FK_29C26BB212469DE2');
        $this->addSql('DROP TABLE vehicle_category');
        $this->addSql('DROP TABLE vehicleview');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql(<<<'SQL'
            ALTER TABLE
              car
            CHANGE
              VIN VIN VARCHAR(17) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`,
            CHANGE
              LicensePlate LicensePlate VARCHAR(8) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`,
            CHANGE
              Color Color VARCHAR(7) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`,
            CHANGE
              type type VARCHAR(30) DEFAULT NULL,
            CHANGE
              Make Make VARCHAR(20) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`,
            CHANGE
              Model Model VARCHAR(20) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`,
            CHANGE
              PriceOfKm PriceOfKm FLOAT NOT NULL,
            CHANGE
              ImageName ImageName VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql('CREATE UNIQUE INDEX LicensePlate ON car (LicensePlate)');
        $this->addSql(<<<'SQL'
            ALTER TABLE
              motorcycle
            CHANGE
              VIN VIN VARCHAR(17) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`,
            CHANGE
              LicensePlate LicensePlate VARCHAR(8) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`,
            CHANGE
              Color Color VARCHAR(7) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`,
            CHANGE
              type type VARCHAR(30) DEFAULT NULL,
            CHANGE
              Make Make VARCHAR(20) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`,
            CHANGE
              Model Model VARCHAR(20) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`,
            CHANGE
              PriceOfKm PriceOfKm FLOAT NOT NULL,
            CHANGE
              ImageName ImageName VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql('CREATE UNIQUE INDEX LicensePlate ON motorcycle (LicensePlate)');
    }
}
