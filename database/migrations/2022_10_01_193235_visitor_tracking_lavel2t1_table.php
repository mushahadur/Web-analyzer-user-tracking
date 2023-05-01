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
        Schema::create('visitor_tracking_lavel2t1', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('track_level1_id');
            $table->integer('user_id');
            $table->string('root_site_url');
            $table->string('domain_name');
            $table->string('visitor_ip');
            $table->string('referrer_url');
            $table->string('browsers');
            $table->string('operating_systems');
            $table->string('device');
            $table->string('social_boot');
            $table->string('search_engines');
            $table->string('visitor_agent');
            $table->string('server_host_addr');
            $table->string('server_name');
            $table->string('server_software');
            $table->string('server_protocol');
            $table->string('server_req_time');
            $table->string('server_req_time_float');
            $table->string('server_root_doc');
            $table->string('server_http_accept');
            $table->string('server_http_accept_encode');
            $table->string('server_http_connection');
            $table->string('server_http_host');
            $table->string('server_remote_port');
            $table->string('script_file');
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
