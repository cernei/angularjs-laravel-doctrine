<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;
use LaravelDoctrine\Migrations\Schema\Table;
use LaravelDoctrine\Migrations\Schema\Builder;

class Version20181025100721 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        (new Builder($schema))->create('vacancies', function(Table $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('category_id');
            $table->string('location');
            $table->text('content');
            $table->timestamps();
        });

        (new Builder($schema))->create('categories', function(Table $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        (new Builder($schema))->dropIfExists('vacancies');
        (new Builder($schema))->dropIfExists('categories');
    }
}
