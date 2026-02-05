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
        Schema::create('carros', function (Blueprint $table) {

            $table->id();
            $table->string('Modelo');
            $table -> string('Marca');
            $table->string('Placa')->unique();
            $table->decimal('Valor_Diaria', 8, 2);
            $table->text('Descricao')->nullable();
            $table->string('Cor');
            $table->year('Ano')->check('Ano >=1900');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {

        Schema::dropIfExists('carros');
    }
};
