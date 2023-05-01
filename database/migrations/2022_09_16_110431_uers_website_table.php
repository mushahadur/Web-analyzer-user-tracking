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
        Schema::create('user_website', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('domain_name');
            $table->string('root_site_url');
            $table->string('privacy_status')->default(1);
            $table->string('notify_mail');
            $table->string('tract_code',500);
            $table->string('status')->default(1);
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
