<?php

/**
 * Created by: Juan Martín Espitia
*/

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
        Schema::table('users', function (Blueprint $table) {
            // Añade los nuevos campos a la tabla users
            $table->string('phone');
            $table->boolean('admin')->default(false);
            $table->string('idBank');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropColumn('phone');
        $table->dropColumn('admin');
        $table->dropColumn('idBank');
    }
};
