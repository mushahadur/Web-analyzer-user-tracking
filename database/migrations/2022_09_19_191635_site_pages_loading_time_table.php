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
        Schema::create('site_pages_loading_time', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('domain_name');
            $table->string('root_site_url');
            $table->string('page_url')->unique();
            $table->string('loading_time');
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
