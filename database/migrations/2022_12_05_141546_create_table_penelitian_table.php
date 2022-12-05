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
        Schema::create('table_penelitian', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->string('status');
            $table->integer('jumlah_kegiatan');
            $table->decimal('beban_tugas', 8, 4);
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
        Schema::dropIfExists('table_penelitian');
    }
};
