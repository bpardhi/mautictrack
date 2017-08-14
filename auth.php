<?php
session_start();
ini_set('display_errors', 1);
include __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/mautic/api-library/lib/MauticApi.php';
use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;
$settings = array(
    'baseUrl'      => 'http://mautic.invensislearning.com',
    'version'      => 'OAuth1a',
    'clientKey'    => '20zctp60tg3oowoc0sc8scg4gkwsgs0go0oggwwocsgws0k4g0',
    'clientSecret' => '3hit2frx5gqogo4804w88sgc0kosos4wk00kggos8g0oksg4ok',
    'callback'     => 'http://localhost/bbb/auth.php'
);

$initAuth = new ApiAuth();
$auth     = $initAuth->newAuth($settings);

if ($auth->validateAccessToken()) {
    if ($auth->accessTokenUpdated()) {
        $accessTokenData = $auth->getAccessTokenData();
        $accT=base64_encode(serialize($auth));
        $myfile = fopen("token.txt", "w") or die("Unable to open file!");
        fwrite($myfile,$accT);
        fclose($myfile);
    }
}
?>
