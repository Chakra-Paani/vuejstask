<?php

//config.php

require_once 'vendor/autoload.php';

$google_client = new Google_Client();
$google_client->setClientid('598582558948-qmlbmmhtac4etcc9spj6s314ol516i3q.apps.googleusercontent.com');

$google_client->setClientSecret('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');

$google_client->setRedirectUri('http://localhost/vuejstasks/index.php');

$google_client->addScope('email');

$google_client->addScope('profile');

session_start();
$_SESSION['start'] = time(); // Taking now logged in time.
/// Ending a session in 30 minutes from the starting time.
$_SESSION['expire'] = $_SESSION['start'] + (3 * 60);


?>