<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_simpulan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_akun');
            $table->decimal('pendidikan', 8, 4);
            $table->decimal('penelitian', 8, 4);
            $table->decimal('pengabdian', 8, 4);
            $table->decimal('penunjang', 8, 4);
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
        Schema::dropIfExists('table_simpulan');
    }
};
