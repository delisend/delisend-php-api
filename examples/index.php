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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_POST['wc_delisend_access_token'])) {
        $_SESSION['token'] = $_POST['wc_delisend_access_token'];
    }

    if (!empty($_POST['wc_delisend_tracking_id'])) {
        $_SESSION['tracking_id'] = $_POST['wc_delisend_tracking_id'];
    }

    if (!empty($_POST['wc_delisend_environment'])) {
        $_SESSION['environment'] = $_POST['wc_delisend_environment'];
    }

    if (!empty($_POST['wc_delisend_enable_automatic_check'])) {
        $_SESSION['automatic_check'] = $_POST['wc_delisend_enable_automatic_check'];
    }

    if (!empty($_POST['wc_delisend_enable_debug_mode'])) {
        $_SESSION['debug'] = $_POST['wc_delisend_enable_debug_mode'];
    }
}

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
                <h4 class="mb-3">Check API status</h4>
                <form method="post">
                    <div class="mb-3 row">
                        <label for="wc_delisend_tracking_id" class="col-sm-4 col-form-label">Tracking ID:</label>
                        <input type="text" id="wc_delisend_tracking_id" class="form-control" name="wc_delisend_tracking_id" value="">
                    </div>
                    <div class="mb-3 row">
                        <label for="wc_delisend_tracking_id" class="col-sm-4 col-form-label">Barber API Token:</label>
                        <textarea id="wc_delisend_access_token" class="form-control" name="wc_delisend_access_token" placeholder=""></textarea>
                    </div>
                    <div class="mb-3 row">
                        <label for="wc_delisend_access_token" class="col-sm-4 col-form-label">Deployment environment:</label>
                        <select id="wc_delisend_access_token" class="form-select form-select-sm form-control" name="wc_delisend_environment" aria-label=".form-select-sm example" >
                            <option value="" selected>Open this select menu</option>
                            <option value="test">Test Environment</option>
                            <option value="prod">Production Environment</option>
                        </select>
                    </div>
                    <div class="mb-3 row">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="wc_delisend_enable_automatic_check" name="wc_delisend_enable_automatic_check">
                            <label class="form-check-label" for="wc_delisend_enable_automatic_check">Enable Automatic check</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="wc_delisend_enable_debug_mode" name="wc_delisend_enable_debug_mode">
                            <label class="form-check-label" for="wc_delisend_enable_debug_mode">Enable debug mode</label>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" value="Submit" class="w-100 btn btn-primary btn-lg">
                    </div>
                </form>
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