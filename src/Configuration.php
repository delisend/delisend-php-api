<?php


namespace DelisendApi;

use InvalidArgumentException;

/**
 * Class Configuration
 * @package Delisend
 */
class Configuration
{
    /**
     * @var
     */
    private static $defaultConfiguration;

    /**
     * Associate array to store API key(s)
     *
     * @var string[]
     */
    protected $apiKeys = [];

    /**
     * Associate array to store API prefix (e.g. Bearer)
     *
     * @var string[]
     */
    protected $apiKeyPrefixes = [];

    /**
     * Access token for OAuth
     *
     * @var string
     */
    protected $accessToken = '';

    /**
     * Username for HTTP basic authentication
     *
     * @var string
     */
    protected $username = '';

    /**
     * Password for HTTP basic authentication
     *
     * @var string
     */
    protected $password = '';

    /**
     * Tracking ID
     *
     * @var string
     */
    protected $tracking_id  = '';

    /**
     * Password for HTTP basic authentication
     *
     * @var string
     */
    protected $environment  = 'test';

    /**
     * The host
     *
     * @var array
     */
    protected $host = [
        'test' =>'https://delisend.com/api/test',
        'prod' =>'https://delisend.com/api/v1',
    ];

    /**
     * User agent of the HTTP request, set to "PHP-Delisend" by default
     *
     * @var string
     */
    protected $userAgent = 'Delisend-Codegen/1.0.0/php';

    /**
     * Debug switch (default set to false)
     *
     * @var bool
     */
    protected $debug = false;

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected $debugFile = 'php://output';

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected $tempFolderPath;

    /**
     * @var Configuration
     */
    private static $instance;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tempFolderPath = sys_get_temp_dir();
    }


    /**
     * Gets the main \Delisend instance.
     * Ensures only one instance can be loaded.
     *
     * @return Configuration
     */
    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * Sets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $key API key or token
     * @return $this
     */
    public function setApiKey($apiKeyIdentifier, $key)
    {
        $this->apiKeys[$apiKeyIdentifier] = $key;
        return $this;
    }


    /**
     * Gets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @return string API key or token
     */
    public function getApiKey($apiKeyIdentifier)
    {
        return isset($this->apiKeys[$apiKeyIdentifier]) ? $this->apiKeys[$apiKeyIdentifier] : null;
    }


    /**
     * Sets the prefix for API key (e.g. Bearer)
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $prefix API key prefix, e.g. Bearer
     * @return $this
     */
    public function setApiKeyPrefix($apiKeyIdentifier, $prefix)
    {
        $this->apiKeyPrefixes[$apiKeyIdentifier] = $prefix;
        return $this;
    }


    /**
     * Gets API key prefix
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @return string
     */
    public function getApiKeyPrefix($apiKeyIdentifier)
    {
        return isset($this->apiKeyPrefixes[$apiKeyIdentifier]) ? $this->apiKeyPrefixes[$apiKeyIdentifier] : null;
    }


    /**
     * Sets the access token for OAuth
     *
     * @param string $accessToken Token for OAuth
     * @return $this
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }


    /**
     * Gets the access token for OAuth
     * @return string Access token for OAuth
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }


    /**
     * Sets the username for HTTP basic authentication
     *
     * @param string $username Username for HTTP basic authentication
     * @return $this
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }


    /**
     * Gets the username for HTTP basic authentication
     *
     * @return string Username for HTTP basic authentication
     */
    public function getUsername(): string
    {
        return $this->username;
    }


    /**
     * Sets the password for HTTP basic authentication
     *
     * @param string $password Password for HTTP basic authentication
     * @return $this
     */
    public function setPassword($password): Configuration
    {
        $this->password = $password;
        return $this;
    }


    /**
     * Gets the password for HTTP basic authentication
     *
     * @return string Password for HTTP basic authentication
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Sets the password for HTTP basic authentication
     *
     * @param string $environment Password for HTTP basic authentication
     * @return $this
     */
    public function setEnvironment(string $environment)
    {
        $this->environment = $environment;
        return $this;
    }


    /**
     * Gets the password for HTTP basic authentication
     *
     * @return string Password for HTTP basic authentication
     */
    public function getEnvironment ()
    {
        return $this->environment ;
    }


    /**
     * Set the tracking ID
     *
     * @param string $tracking_id
     * @return $this
     */
    public function setTrackingId(string $tracking_id)
    {
        $this->tracking_id = $tracking_id;
        return $this;
    }


    /**
     * Get tracking ID
     *
     * @return string
     */
    public function getTrackingId ()
    {
        return $this->tracking_id ;
    }

    /**
     * Sets the host
     *
     * @param string $host Host
     * @return $this
     */
    public function setHost($host)
    {
        $this->host[$this->environment] = $host;
        return $this;
    }


    /**
     * Gets the host
     *
     * @return string Host
     */
    public function getHost(string $environment = null)
    {
        if ($environment === null) {
            $environment = $this->environment;
        }
        return $this->host[$environment];
    }


    /**
     * Sets the user agent of the api client
     *
     * @param string $userAgent the user agent of the api client
     * @return $this
     * @throws InvalidArgumentException
     */
    public function setUserAgent($userAgent)
    {
        if (!is_string($userAgent)) {
            throw new InvalidArgumentException('User-agent must be a string.');
        }

        $this->userAgent = $userAgent;
        return $this;
    }


    /**
     * Gets the user agent of the api client
     *
     * @return string user agent
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }


    /**
     * Sets debug flag
     *
     * @param bool $debug Debug flag
     * @return $this
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
        return $this;
    }


    /**
     * Gets the debug flag
     *
     * @return bool
     */
    public function getDebug()
    {
        return $this->debug;
    }


    /**
     * Sets the debug file
     *
     * @param string $debugFile Debug file
     * @return $this
     */
    public function setDebugFile($debugFile)
    {
        $this->debugFile = $debugFile;
        return $this;
    }


    /**
     * Gets the debug file
     *
     * @return string
     */
    public function getDebugFile()
    {
        return $this->debugFile;
    }


    /**
     * Sets the temp folder path
     *
     * @param string $tempFolderPath Temp folder path
     * @return $this
     */
    public function setTempFolderPath($tempFolderPath)
    {
        $this->tempFolderPath = $tempFolderPath;
        return $this;
    }


    /**
     * Gets the temp folder path
     *
     * @return string Temp folder path
     */
    public function getTempFolderPath()
    {
        return $this->tempFolderPath;
    }


    /**
     * Gets the essential information for debugging
     *
     * @return string The report for debugging
     */
    public static function toDebugReport()
    {
        $report = 'PHP SDK (Delisend) Debug Report:' . PHP_EOL;
        $report .= '    OS: ' . php_uname() . PHP_EOL;
        $report .= '    PHP Version: ' . PHP_VERSION . PHP_EOL;
        $report .= '    OpenAPI Spec Version: 3.1' . PHP_EOL;
        $report .= '    Temp Folder Path: ' . self::getDefaultConfiguration()->getTempFolderPath() . PHP_EOL;

        return $report;
    }


    /**
     * Get API key (with prefix if set)
     *
     * @param string $apiKeyIdentifier name of apikey
     * @return string API key with the prefix
     */
    public function getApiKeyWithPrefix($apiKeyIdentifier)
    {
        $prefix = $this->getApiKeyPrefix($apiKeyIdentifier);
        $apiKey = $this->getApiKey($apiKeyIdentifier);

        if ($apiKey === null) {
            return null;
        }

        if ($prefix === null) {
            $keyWithPrefix = $apiKey;
        } else {
            $keyWithPrefix = $prefix . ' ' . $apiKey;
        }

        return $keyWithPrefix;
    }
}
