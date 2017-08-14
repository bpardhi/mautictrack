<?php
session_start();
ini_set('display_errors', 1);
include __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/mautic/api-library/lib/MauticApi.php';
use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;
$settings = array(
    'baseUrl'      => 'http://localhost/mauticdev/mautic/index.php',
    'version'      => 'OAuth1a',
    'clientKey'    => '115fkyb1o6xw0kocg880wg4w4c04gcgsk0cgg8s8scckk4wkw',
    'clientSecret' => '2duyuez4h68048gwogc0o4cgc0sggcok4ssc4gccgk084cwk8g',
    'callback'     => 'http://localhost/bbb/auth.php'
);

$initAuth = new ApiAuth();
$auth     = $initAuth->newAuth($settings);

if ($auth->validateAccessToken()) {
    if ($auth->accessTokenUpdated()) {
        $accessTokenData = $auth->getAccessTokenData();
        $accT=base64_encode(serialize($auth));

$conn = new mysqli('localhost', 'root', 'bhushan', 'token');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="UPDATE `accesstoken` SET `at` = '$accT' WHERE `accesstoken`.`id` = 1";
$conn->query($sql);
var_dump($accT);

    }
}
?>
