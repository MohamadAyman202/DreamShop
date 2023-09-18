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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyInteger('type');
            $table->tinyInteger('status');
            $table->integer('usage_limit');
            $table->integer('limit_per_customer');
            $table->float('price');
            $table->float('min_spend');
            $table->string('code');
            $table->dateTimeTz('start_time');
            $table->dateTimeTz('end_time');
            $table->foreignId('admin_id')->constrained()->onDelete('cascade');
            $table->integer('capped_price')->nullable();
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
        Schema::dropIfExists('vouchers');
    }
};
