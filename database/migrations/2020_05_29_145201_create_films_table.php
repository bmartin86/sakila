<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/*
 CREATE TABLE `film` (
	`film_id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(128) NOT NULL,
	`description` TEXT NULL DEFAULT NULL,
	`release_year` YEAR NULL DEFAULT NULL,
	`language_id` TINYINT(3) UNSIGNED NOT NULL,
	`original_language_id` TINYINT(3) UNSIGNED NULL DEFAULT NULL,
	`rental_duration` TINYINT(3) UNSIGNED NOT NULL DEFAULT 3,
	`rental_rate` DECIMAL(4,2) NOT NULL DEFAULT 4.99,
	`length` SMALLINT(5) UNSIGNED NULL DEFAULT NULL,
	`replacement_cost` DECIMAL(5,2) NOT NULL DEFAULT 19.99,
	`rating` ENUM('G','PG','PG-13','R','NC-17') NULL DEFAULT 'G',
	`special_features` SET('Trailers','Commentaries','Deleted Scenes','Behind the Scenes') NULL DEFAULT NULL,
	`last_update` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	PRIMARY KEY (`film_id`),
	INDEX `idx_title` (`title`),
	INDEX `idx_fk_language_id` (`language_id`),
	INDEX `idx_fk_original_language_id` (`original_language_id`),
	CONSTRAINT `fk_film_language` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON UPDATE CASCADE,
	CONSTRAINT `fk_film_language_original` FOREIGN KEY (`original_language_id`) REFERENCES `language` (`language_id`) ON UPDATE CASCADE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1001
;

 */
class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->smallIncrements('film_id');
            $table->string('title',128)->index();
            $table->text('description')->nullable();
            $table->year('release_year')->nullable();
            $table->tinyInteger('language_id')->index()->unsigned();
            $table->tinyInteger('original_language_id')->index()->nullable()->unsigned()->default=NULL;
            $table->tinyInteger('rental_duration')->unsigned();
            $table->decimal('rental_rate', 4, 2)->default('4.99');
            $table->smallInteger('lenght')->unsigned()->nullable();
            $table->decimal('replacement_cost', 5, 2)->default('19.99');
            // rating` ENUM('G','PG','PG-13','R','NC-17') NULL DEFAULT 'G'
            $table->enum('rating', ['G','PG','PG-13','R','NC-17'])->nullable()->default('G');
            $table->set('special_features',['Trailers','Commentaries','Deleted Scenes','Behind the Scenes'])->nullable();
            $table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
