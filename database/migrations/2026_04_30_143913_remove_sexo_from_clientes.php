<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->dropForeign(['id_cliente']);
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('sexo');
        });

        Schema::table('citas', function (Blueprint $table) {
            $table->foreign('id_cliente')->references('cedula')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            Schema::table('citas', function (Blueprint $table) {
                $table->dropForeign(['id_cliente']);
            });
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->string('sexo', 10)->nullable()->after('telefono');
        });

        Schema::table('citas', function (Blueprint $table) {
            $table->foreign('id_cliente')->references('cedula')->on('clientes');
        });
    }
};
