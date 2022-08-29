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
        Schema::create('exchanges', function (Blueprint $table) {
            // $table->id();
            // $table->string('exchange_id')->nullable();
            // $table->string('name')->nullable();
            // $table->string('slug')->unique();
            // $table->integer('year_established')->nullable();
            // $table->string('country')->nullable();
            // $table->string('url')->nullable();
            // $table->string('image')->nullable();
            // $table->integer('trust_score')->nullable();
            // $table->integer('trust_score_rank')->nullable();
            // $table->string('meta')->nullable();
            // $table->timestamp("created_at")->useCurrent();
            // $table->timestamp("updated_at")->useCurrent()->useCurrentOnUpdate();

            // $table->engine = 'InnoDB';
            // $table->charset = 'utf8mb4';
            // $table->collation = 'utf8mb4_unicode_ci';


            $table->id();
            $table->string('exchanges_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('logo')->nullable();
            $table->string('country')->nullable();
            $table->string('description')->nullable();
            $table->string('year_established')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->boolean('has_trading_incentive')->nullable()->default(false);
            $table->integer('trust_score')->nullable();
            $table->integer('trust_score_rank')->nullable();
            $table->integer('trade_volume_24h_btc')->nullable();
            $table->integer('trade_volume_24h_btc_normalized')->nullable();

            // extra data
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('exchanges');
    }
};
