<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGiftCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_gift_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->constrained('users');
            $table->foreignID('gift_card_id')->constrained('gift_cards');
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
        Schema::dropIfExists('user_gift_cards');
    }
}
