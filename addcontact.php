
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

$myfile = fopen("token.txt", "r") or die("Unable to open file!");
// $authtoken= fgets($myfile);
$authtoken=file_get_contents("token.txt");
fclose($myfile);
    $_SESSION["tok"]=unserialize(base64_decode($authtoken));
//      var_dump($_SESSION["tok"]);
$apiUrl     = "http://mautic.invensislearning.com";
$api        = new MauticApi();
$contactApi = $api->newApi("contacts", $_SESSION['tok'], $apiUrl);
$data = array(
    'firstname' => $first,
    'lastname'  => $last,
    'email'     => $email,
    'ipAddress' => $_SERVER['REMOTE_ADDR'],
    'course' => $course,
    'tags' => 'optedforcourse',
);

$contact = $contactApi->create($data);
//var_dump($contact);
// $sessionId = $_COOKIE['mautic_session_id'];
// $leadId      = $_COOKIE[$sessionId];
// echo $leadId;
echo "Contact added ";
//exec ("php ../mauticdev/mautic/app/console mautic:segment:update" |at now );
// shell_exec('php ../mauticdev/mautic/app/console mautic:segment:update >/dev/null 2>/dev/null &');
$d = urlencode(base64_encode(serialize(array(
    'page_url'   => 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
    'page_title' => 'add',    // Use your website's means of retrieving the title or manually insert it
    'email' => $loggedInUsersEmail // Use your website's means of user management to retrieve the email
))));

echo '<img src="http://mautic.invensislearning.com/mtracking.gif?d=' . $d . '" style="display: none;" />';
