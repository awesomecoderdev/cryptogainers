<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coin extends Model
{
    use HasFactory, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "slug",
        "name",
        "coin_id",
        "symbol",
        "asset_platform_id",
        "platforms",
        "block_time_in_minutes",
        "hashing_algorithm",
        "categories",
        "public_notice",
        "additional_notices",
        "localization",
        "description",
        "links",
        "image",
        "country_origin",
        "genesis_date",
        "sentiment_votes_up_percentage",
        "sentiment_votes_down_percentage",
        "ico_data",
        "market_cap_rank",
        "coingecko_rank",
        "coingecko_score",
        "developer_score",
        "community_score",
        "liquidity_score",
        "public_interest_score",
        "community_data",
        "developer_data",
        "public_interest_stats",
        "status_updates",
        "last_updated",
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'coin_id';

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'coin_id'
            ]
        ];
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    function getRouteKeyName()
    {
        return "slug";
    }
}
