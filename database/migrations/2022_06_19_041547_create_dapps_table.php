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
        Schema::create('dapps', function (Blueprint $table) {
            $table->id();
            $table->string('dapp_logo')->nullable();
            $table->string('dapp_name')->nullable();
            $table->string('dapp_link')->nullable();
            $table->string('dapp_category')->nullable();
            $table->string('favorte_status')->default('0');
            $table->string('desc')->nullable();
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
        Schema::dropIfExists('dapps');
    }
};
