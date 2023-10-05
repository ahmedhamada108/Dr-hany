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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('slogan')->nullable();
            $table->string('about_us_part1')->nullable();
            $table->string('about_us_part2')->nullable();
            $table->string('patient_number')->nullable();
            $table->string('surgeries_number')->nullable();
            $table->string('visitors_number')->nullable();
            $table->string('address')->nullable();
            $table->string('map_url')->nullable();
            $table->string('image_path_map')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('content_footer')->nullable();
            $table->string('terms_of_use')->nullable();
            $table->string('privacy_policy')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_settings');
    }
};
