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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('overview');
            $table->text('tags')->nullable();
            $table->string('unit');
            $table->double('selling');
            $table->double('purchased');
            $table->double('offered');
            $table->string('images');
            $table->string('badge')->nullable();
            $table->string('video')->nullable();
            $table->string('video_thumb')->nullable();
            $table->tinyInteger('status');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('sub_category_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('warranty')->nullable();
            $table->tinyInteger('refundable');
            $table->foreignId('tax_rule_id')->constrained()->onDelete('cascade');
            // $table->foreignId('shipping_rule_id')->constrained()->onDelete('cascade');
            $table->integer('review_count')->nullable();
            $table->integer('rating')->nullable();
            $table->foreignId('bundle_deal_id')->constrained()->onDelete('cascade');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->foreignId('admin_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
