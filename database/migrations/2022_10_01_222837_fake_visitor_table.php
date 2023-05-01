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
        Schema::create('fake_visitor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('track_level1_id');
            $table->integer('user_id');
            $table->string('root_site_url');
            $table->string('domain_name');
            $table->string('visitor_ip');
            $table->string('success_status');
            $table->string('time');
            $table->string('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
