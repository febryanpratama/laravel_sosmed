<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatuswebhookToKontens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kontens', function (Blueprint $table) {
            //
            $table->enum('status_posting', ['Menunggu', 'Berhasil', 'Gagal'])->after('status_post')->default('Menunggu');
            $table->string('url_post')->after('status_posting')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kontens', function (Blueprint $table) {
            //
        });
    }
}
