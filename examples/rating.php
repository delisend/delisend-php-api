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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request['data']['firstname'] = 'Peter';
    $request['data']['lastname'] = 'Testovač';
    $request['data']['address'] = 'Podjavorinskej 15/36';
    $request['data']['zip'] = '908 73';
    $request['data']['city'] = 'Veľké Leváre';
    $request['data']['email'] = 'nepreberac@gmail.com';
    $request['data']['phone'] = '+421903274461';
    //$request['data']['customer_ip'] = '212.37.87.204';

    $request['data']['order_id'] = 1254875;
    $request['data']['client_id'] = 2727;

    $request['data']['type'] = 'rma';
    $request['data']['user_agent'] = null;
    $request['data']['payment_method'] = null;
    $request['domain'] = 'https://rosigroup.com';
    $request['tracking_id'] = 'DS-FDA4A996-1';
    $request['request_ip'] = '212.57.32.149';
    $request['store_id'] = 'rosigroup.com';
}

try {
    $ratingApi = $delisend->RatingApi();
    if (!empty($request)) {
        $result = json_decode($ratingApi->ratingGet($request));
    }
} catch (Exception $e) {
    /*dump($e->getTrace());
    dump(json_decode($result));
    dump($e->getMessage());*/
    dump(json_decode($e->getResponseBody()));
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

                <form class="needs-validation" method="post" novalidate>
                    <div class="row g-3">
                        <div class="col-5">
                            <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="col-sm-2 justify-content-center align-items-center">
                            <strong>or</strong>
                        </div>
                        <div class="col-sm-5">
                            <label for="phone" class="form-label">Phone <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="phone" name="data[phone]" placeholder="Format: +421..." value="" required>
                            <div class="invalid-feedback">
                                Valid phone number is required.
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="col-md-5">
                            <label for="city" class="form-label">City / Village</label>
                            <input id="city" type="text" name="data[city]" class="form-control" placeholder="">
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="zip" name="data[zip]" placeholder="">
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="country" class="form-label">Country</label>
                            <select id="country_id" class="form-control form-select" name="data[country_id]" required>
                                <option value="">Choose...</option>
                                <option value="SK">Slovenská republika</option>
                                <option value="CZ">Česká republika</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Custom parameters</h4>

                    <div class="row gy-3">
                        <div class="col-md-4">
                            <label for="order-id" class="form-label">Order ID</label>
                            <input type="text" class="form-control" id="order-id" name="order_id" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label for="client-id" class="form-label">Customer ID</label>
                            <input type="text" class="form-control" id="client_id" name="client_id" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label for="type" class="form-label">Type</label>
                            <select id="type" class="form-control form-select" name="data[type]" required>
                                <option value="">Choose...</option>
                                <option value="rma">RMA</option>
                                <option value="delivery">Delivery</option>
                            </select>
                        </div>
                    </div>

                    <div class="row gy-3">
                        <div class="col-md-4">
                            <label for="storeID" class="form-label">Store ID</label>
                            <input type="text" class="form-control" id="storeID" name="store_id" placeholder="">
                            <small class="text-muted">Full name as displayed on card</small>
                        </div>

                        <div class="col-md-4">
                            <label for="domain" class="form-label">Domain</label>
                            <input type="text" class="form-control" id="domain" name="domain" placeholder="">
                        </div>

                        <div class="col-md-4">
                            <label for="request_ip" class="form-label">Request IP adress</label>
                            <input type="text" class="form-control" id="request_ip" name="request_ip" placeholder="">
                        </div>

                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Submit</button>
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