<?php

namespace DelisendApi;

use DelisendApi\Api\AccountApi;
use DelisendApi\Api\RatingApi;


/**
 * Class DelisendRestAPI
 * @package Delisend
 */
final class DelisendRestAPI
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;


    /**
     * Delisend constructor.
     */
    public function __construct(
        \DelisendApi\Client         $client = null,
        \DelisendApi\Configuration  $config = null,
        \DelisendApi\HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new \DelisendApi\Client();
        $this->config = $config ?: new \DelisendApi\Configuration();
        $this->headerSelector = $selector ?: new \DelisendApi\HeaderSelector();
    }


    /**
     * @return AccountApi
     */
    public function AccountApi(): AccountApi
    {
        return new AccountApi($this->client, $this->config, $this->headerSelector);
    }


    /**
     * @return RatingApi
     */
    public function RatingApi(): RatingApi
    {
        return new RatingApi($this->client, $this->config, $this->headerSelector);
    }
}
