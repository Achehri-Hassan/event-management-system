<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('titre',150);
            $table->text("content");
            $table->string('image',255)->nullable();

            $table->date('date_evenement');
            $table->dateTime('date_publication');

            $table->text("lieu");
            $table->decimal("prix", 10 ,2);

            $table->enum("status", ["publish" , "draft"]);

            $table->unsignedBigInteger('id_organisateur');
            $table->unsignedBigInteger('id_category');

            $table->time("heure_evenement");
            $table->integer("nombre_places");
            $table->date("date_fin")->nullable();
            
            $table->foreign('id_organisateur')->references("id_organisateur")->on("organisateur");
            $table->foreign("id")->references("id")->on("category");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
