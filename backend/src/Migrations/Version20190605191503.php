<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190605191503 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tf_category (id UUID NOT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN tf_category.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE tf_user (id INT NOT NULL, login VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, player_id UUID DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4D72964EAA08CB10 ON tf_user (login)');
        $this->addSql('COMMENT ON COLUMN tf_user.player_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE tf_competition (id UUID NOT NULL, create_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, update_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, category_id UUID NOT NULL, start_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, end_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, weight DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN tf_competition.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN tf_competition.category_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE tf_player (id UUID NOT NULL, create_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, update_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, delete_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, nick VARCHAR(255) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, second_name VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, sex VARCHAR(1) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN tf_player.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE tf_match (id UUID NOT NULL, create_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, update_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, delete_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, team_a UUID NOT NULL, team_b UUID NOT NULL, state VARCHAR(32) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN tf_match.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN tf_match.team_a IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN tf_match.team_b IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE tf_set (id UUID NOT NULL, create_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, update_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, delete_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, score_a INT NOT NULL, score_b INT NOT NULL, state VARCHAR(32) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN tf_set.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE tf_team (id UUID NOT NULL, create_at TIMESTAMP(0) WITH TIME ZONE NOT NULL, update_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, delete_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, player_a UUID NOT NULL, player_b UUID NOT NULL, tournament_count INT NOT NULL, match_count INT NOT NULL, match_win_count INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_401E618EE159D73 ON tf_team (player_a)');
        $this->addSql('CREATE INDEX IDX_401E618771CCCC9 ON tf_team (player_b)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_401E618EE159D73771CCCC9 ON tf_team (player_a, player_b)');
        $this->addSql('COMMENT ON COLUMN tf_team.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN tf_team.player_a IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN tf_team.player_b IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE tf_player_rating (player_id UUID NOT NULL, category_id UUID NOT NULL, position INT NOT NULL, rating INT NOT NULL, rating_type SMALLINT NOT NULL, rank VARCHAR(64) NOT NULL, tournament_count INT NOT NULL, match_count INT NOT NULL, match_win_count INT NOT NULL, last_activity DATE DEFAULT NULL, PRIMARY KEY(player_id, category_id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BE4AACCF99E6F5DF ON tf_player_rating (player_id)');
        $this->addSql('COMMENT ON COLUMN tf_player_rating.player_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN tf_player_rating.category_id IS \'(DC2Type:uuid)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('DROP TABLE tf_category');
        $this->addSql('DROP TABLE tf_user');
        $this->addSql('DROP TABLE tf_competition');
        $this->addSql('DROP TABLE tf_player');
        $this->addSql('DROP TABLE tf_match');
        $this->addSql('DROP TABLE tf_set');
        $this->addSql('DROP TABLE tf_team');
        $this->addSql('DROP TABLE tf_player_rating');
    }
}
