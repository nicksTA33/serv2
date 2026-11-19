<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261119111543 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE vehicleview (
              id VARCHAR(40) NOT NULL,
              Make VARCHAR(255) NOT NULL,
              Model VARCHAR(255) NOT NULL,
              PriceOfKm DOUBLE PRECISION NOT NULL,
              ImageName VARCHAR(255) NOT NULL,
              category_id INT DEFAULT NULL,
              type VARCHAR(30) NOT NULL,
              INDEX IDX_29C26BB212469DE2 (category_id),
              PRIMARY KEY (id)
            ) DEFAULT CHARACTER SET utf8mb4
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (
              id BIGINT AUTO_INCREMENT NOT NULL,
              body LONGTEXT NOT NULL,
              headers LONGTEXT NOT NULL,
              queue_name VARCHAR(190) NOT NULL,
              created_at DATETIME NOT NULL,
              available_at DATETIME NOT NULL,
              delivered_at DATETIME DEFAULT NULL,
              INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (
                queue_name, available_at, delivered_at,
                id
              ),
              PRIMARY KEY (id)
            )
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE
              vehicleview
            ADD
              CONSTRAINT FK_29C26BB212469DE2 FOREIGN KEY (category_id) REFERENCES vehicle_category (id)
        SQL);
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP INDEX LicensePlate ON car');
        $this->addSql(<<<'SQL'
            ALTER TABLE
              car
            CHANGE
              LicensePlate LicensePlate VARCHAR(8) NOT NULL,
            CHANGE
              VIN VIN VARCHAR(17) NOT NULL,
            CHANGE
              Color Color VARCHAR(6) NOT NULL,
            CHANGE
              Make Make VARCHAR(255) NOT NULL,
            CHANGE
              Model Model VARCHAR(255) NOT NULL,
            CHANGE
              PriceOfKm PriceOfKm DOUBLE PRECISION NOT NULL,
            CHANGE
              ImageName ImageName VARCHAR(255) NOT NULL,
            CHANGE
              type type VARCHAR(40) NOT NULL
        SQL);
        $this->addSql('DROP INDEX LicensePlate ON motorcycle');
        $this->addSql(<<<'SQL'
            ALTER TABLE
              motorcycle
            CHANGE
              LicensePlate LicensePlate VARCHAR(8) NOT NULL,
            CHANGE
              VIN VIN VARCHAR(17) NOT NULL,
            CHANGE
              Color Color VARCHAR(6) NOT NULL,
            CHANGE
              Make Make VARCHAR(255) NOT NULL,
            CHANGE
              Model Model VARCHAR(255) NOT NULL,
            CHANGE
              PriceOfKm PriceOfKm DOUBLE PRECISION NOT NULL,
            CHANGE
              ImageName ImageName VARCHAR(255) NOT NULL,
            CHANGE
              type type VARCHAR(40) NOT NULL
        SQL);
        $this->addSql('ALTER TABLE vehicle_category ADD name VARCHAR(255) NOT NULL');
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
        $this->addSql('ALTER TABLE vehicle_category DROP name');
    }
}
