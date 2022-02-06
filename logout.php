<?php 

include('config.php');

$google_client->revokeToken($_SESSION[ 'access_token' ]);
session_destroy();

header('location:index.php');

?>