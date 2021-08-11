<?php

namespace Delisend;

use Delisend\Api\AccountApi;
use Delisend\Api\RatingApi;


/**
 * Class DelisendAPI
 * @package Delisend
 */
final class DelisendAPI
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
        \Delisend\Client $client = null,
        \Delisend\Configuration $config = null,
        \Delisend\HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new \Delisend\Client();
        $this->config = $config ?: new \Delisend\Configuration();
        $this->headerSelector = $selector ?: new \Delisend\HeaderSelector();
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
