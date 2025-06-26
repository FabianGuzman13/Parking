<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('reservas', function (Blueprint $table) {
        if (!Schema::hasColumn('reservas', 'sede_id')) {
            $table->unsignedBigInteger('sede_id')->after('id');
            $table->foreign('sede_id')->references('id')->on('sedes')->onDelete('cascade');
        }
    });
}

public function down()
{
    Schema::table('reservas', function (Blueprint $table) {
        $table->dropColumn('sede_id');
    });
}
};


