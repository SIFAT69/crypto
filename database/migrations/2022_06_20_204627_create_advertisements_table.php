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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('link')->nullable();
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->string('ads')->nullable();
            $table->string('click_limits')->nullable();
            $table->string('package')->nullable();
            $table->string('ref_code')->nullable();
            $table->string('owner_id')->nullable();
            $table->string('status')->default('Pending');
            $table->string('txHash')->nullable();
            $table->string('ads_start')->default("No");
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
        Schema::dropIfExists('advertisements');
    }
};
