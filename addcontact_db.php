<?php
$first= $_POST["first"];
$last=$_POST["last"];
$email=$_POST["email"];
$course=$_POST["course"];
ini_set('display_errors', 1);
session_start();
include __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/mautic/api-library/lib/MauticApi.php';
use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;

$con1=mysqli_connect("localhost","root","bhushan","token");
$sql1="SELECT * FROM `accesstoken` WHERE id=1";
$result1=mysqli_query($con1,$sql1);
  while ($row=mysqli_fetch_row($result1))
    {
    $_SESSION["tok"]=unserialize(base64_decode($row[1]));
  }
// var_dump($_SESSION['tok']);
$apiUrl     = "http://localhost/mauticdev/mautic/index.php/";
$api        = new MauticApi();
$contactApi = $api->newApi("contacts", $_SESSION['tok'], $apiUrl);
$data = array(
    'firstname' => $first,
    'lastname'  => $last,
    'email'     => $email,
    'ipAddress' => $_SERVER['REMOTE_ADDR'],
    'course' => $course,
    'tags' => 'optedforcourse'
);

$contact = $contactApi->create($data);
// var_dump($contact);
echo "Contact added ";
//exec ("php ../mauticdev/mautic/app/console mautic:segment:update" |at now );
shell_exec('php ../mauticdev/mautic/app/console mautic:segment:update >/dev/null 2>/dev/null &');
