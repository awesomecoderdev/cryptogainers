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
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            // default
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->string('icon')->nullable();

            // api
            $table->string('coin_id')->nullable();
            $table->string('symbol')->nullable();
            $table->string('name')->nullable();
            $table->text('asset_platform_id')->nullable();
            $table->text('platforms')->nullable();
            $table->string('block_time_in_minutes')->nullable();
            $table->string('hashing_algorithm')->nullable();
            $table->text('categories')->nullable();
            $table->text('public_notice')->nullable();
            $table->text('additional_notices')->nullable();
            $table->text('localization')->nullable();
            $table->text('description')->nullable();
            $table->text('links')->nullable();
            $table->text('image')->nullable();
            $table->string('country_origin')->nullable();
            $table->string('genesis_date')->nullable();
            $table->string('sentiment_votes_up_percentage')->nullable();
            $table->string('sentiment_votes_down_percentage')->nullable();
            $table->text('ico_data')->nullable();
            $table->string('market_cap_rank')->nullable();
            $table->string('coingecko_rank')->nullable();
            $table->string('coingecko_score')->nullable();
            $table->string('developer_score')->nullable();
            $table->string('community_score')->nullable();
            $table->string('liquidity_score')->nullable();
            $table->string('public_interest_score')->nullable();
            $table->text('community_data')->nullable();
            $table->text('developer_data')->nullable();
            $table->text('public_interest_stats')->nullable();
            $table->text('status_updates')->nullable();
            $table->string('last_updated')->nullable();

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
        Schema::dropIfExists('coins');
    }
};
