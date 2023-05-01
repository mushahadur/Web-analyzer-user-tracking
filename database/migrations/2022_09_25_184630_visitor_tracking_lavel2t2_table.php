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
        Schema::create('visitor_tracking_lavel2t2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('track_level1_id');
            $table->integer('user_id');
            $table->string('root_site_url');
            $table->string('visitor_ip');
            $table->string('success_status');
            $table->string('ipv_type');
            $table->string('continents');
            $table->string('continent_code');
            $table->string('country');
            $table->string('country_code');
            $table->string('region');
            $table->string('region_code');
            $table->string('city');
            $table->string('languages');
            $table->string('screen_resolutions');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('is_eu');
            $table->string('postal');
            $table->string('calling_code');
            $table->string('capital');
            $table->string('borders');
            $table->string('flag_img');
            $table->string('flag_emoji_unicode');
            $table->string('connection_asn');
            $table->string('connection_org');
            $table->string('connection_isp');
            $table->string('connection_domain');
            $table->string('timezone_id');
            $table->string('timezone_abbr');
            $table->string('timezone_is_dst');
            $table->string('timezone_offset');
            $table->string('timezone_utc');
            $table->string('timezone_current_time');
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
