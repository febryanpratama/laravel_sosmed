<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTerjadwalToKontens extends Migration
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
            $table->timestamp('date_jadwal')->after('app')->default(now());
            $table->enum('status_post', ['Instan', 'Terjadwal'])->after('date_jadwal')->default('Terjadwal');
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
