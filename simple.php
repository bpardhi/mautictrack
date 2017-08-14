<?php
ini_set('display_errors', 1);
session_start();
include 'vendor/autoload.php';
use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;
$settings = array(
    'userName'   => 'admin',             // Create a new user
    'password'   => 'password'
);
$initAuth = new ApiAuth();
$auth = $initAuth->newAuth($settings, 'BasicAuth');
