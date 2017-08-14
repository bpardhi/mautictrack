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
    'clientKey'    => '4xd6xqx986io00ss0k0kk8osg8wc0kgk4gscscsggs00gc4wwk',
    'clientSecret' => '5ajldgdatsgs8kggcw0c484os4s8ks808gg448k0gw0kokwwg8',
    'callback'     => 'http://localhost/bbb/auth.php'
);

$initAuth = new ApiAuth();
$auth = $initAuth->newAuth($settings);

if ($auth->validateAccessToken()) {
    if ($auth->accessTokenUpdated()) {
        $accessTokenData = $auth->getAccessTokenData();
        $accT=base64_encode(serialize($auth));
        $myfile = fopen("token.txt", "w") or die("Unable to open file!");
        fwrite($myfile,$accT);
        fclose($myfile);
        var_dump($auth);
        echo "</br>";
        var_dump($accT);
        echo "</br>";
        $t1=unserialize(base64_decode($accT));
        echo "</br>";
        if($auth==$t1){
          echo "equal";
        }
    }
}
?>
