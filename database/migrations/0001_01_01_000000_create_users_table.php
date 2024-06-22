<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseSchema extends Migration
{
    public function up()
    {
        // Create Akcija table
        Schema::create('akcija', function (Blueprint $table) {
            $table->id('AkcijaID');
            $table->date('AkcijaSpeka')->nullable();
            $table->decimal('AkcijasCena', 10, 2)->nullable();
            $table->timestamps();
        });

        // Create Produkts table
        Schema::create('produkts', function (Blueprint $table) {
            $table->id('Svitrkods');
            $table->string('Nosaukums', 50);
            $table->decimal('Daudzums', 10, 2);
            $table->string('Mervieniba', 50);
            $table->timestamps();
        });

        // Create Lokacija table
        Schema::create('lokacija', function (Blueprint $table) {
            $table->string('Iela', 50)->primary();
            $table->string('Pilseta', 50);
            $table->string('Valsts', 50);
            $table->timestamps();
        });

        // Create Cena table
        Schema::create('cena', function (Blueprint $table) {
            $table->id('CenaID');
            $table->decimal('CenaParVienu', 10, 2);
            $table->decimal('CenaParVienibu', 10, 2);
            $table->unsignedBigInteger('AkcijaID')->nullable();
            $table->foreign('AkcijaID')->references('AkcijaID')->on('akcija');
            $table->timestamps();
        });

        // Create Veikals table
        Schema::create('veikals', function (Blueprint $table) {
            $table->id('Veikals_ID');
            $table->string('Vieta', 50);
            $table->string('Nosaukums', 50);
            $table->foreign('Vieta')->references('Iela')->on('lokacija');
            $table->timestamps();
        });

        // Create CenuZime table
        Schema::create('cenu_zime', function (Blueprint $table) {
            $table->id('CenuZimeID');
            $table->unsignedBigInteger('Svitrkods');
            $table->unsignedBigInteger('VeikalsID');
            $table->date('Datums');
            $table->unsignedBigInteger('CenaID');
            $table->foreign('Svitrkods')->references('Svitrkods')->on('produkts');
            $table->foreign('VeikalsID')->references('Veikals_ID')->on('veikals');
            $table->foreign('CenaID')->references('id')->on('cena');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cenu_zime');
        Schema::dropIfExists('veikals');
        Schema::dropIfExists('cena');
        Schema::dropIfExists('lokacija');
        Schema::dropIfExists('produkts');
        Schema::dropIfExists('akcija');
    }
}
