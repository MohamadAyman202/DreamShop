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
        Schema::create('withdrawal_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('account_number');
            $table->string('account_name');
            $table->string('bank_name');
            $table->string('branch_name');
            $table->tinyInteger('default')->default(0);
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
        Schema::dropIfExists('withdrawal_accounts');
    }
};
