<?php
session_start();

require '../library/autoload.php';

use DelisendApi\Configuration;
use DelisendApi\Client;
use DelisendApi\HeaderSelector;
use DelisendApi\DelisendRestAPI;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$result = [];
$request = [];

// Configure HTTP basic authorization: BasicAuth
$config = Configuration::instance()
    ->setAccessToken((isset($_SESSION['token'])) ? $_SESSION['token'] : $_ENV['DELISEND_TOKEN'])
    ->setTrackingId((isset($_SESSION['tracking_id'])) ? $_SESSION['tracking_id'] : $_ENV['DELISEND_TRACKING_ID'])
    ->setEnvironment((isset($_SESSION['environment'])) ? $_SESSION['environment'] : $_ENV['DELISEND_ENVIRONMENT']);

$delisend = new DelisendRestAPI(new Client, $config, new HeaderSelector);

try {
    $accountApi = $delisend->AccountApi();
    $result = json_decode($accountApi->accountGet());
} catch (Exception $e) {
    echo 'Exception when calling AccountApi->accountGet: ', $e->getMessage(), PHP_EOL;
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "partials/head.php"; ?>
<body class="bg-light">

<?php include_once "partials/header.php"; ?>
<div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="assets/brand/delisend-logo.png" alt="Delisend REST API" width="122" height="38">
            <h2>The official PHP library for Delisend v1 API</h2>
            <p class="lead"> This is the official <a href="https://delisend.com" target="_blank">Delisend</a> SDK. To install the bindings via Composer, run the following command in terminal, inside your project directory:</p>
            <p>
                <code>
                    composer require delisend/delisend-php-api
                </code>
            </p>
        </div>
        <div class="row">
            <div class="col-md-7 col-lg-8 api-md-last">
                <h4 class="mb-3">Api Call</h4>

            </div>
            <div class="col-md-5 col-lg-4 status-md-last">
                <h4 class="mb-3">Response Example</h4>
                <?php dump($result); ?>
            </div>
        </div>
    </main>
</div>
<?php include_once "partials/footer.php"; ?>
</body>
</html>
