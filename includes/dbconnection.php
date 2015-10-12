<?php

$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

if ($openShiftVar === null || $openShiftVar == "")
{
     // Not in the openshift environment
     $dbHost = "localhost";
     require 'setLocalDatabaseCredentials.php';
     // …
}
else 
{
     // In the openshift environment 
     $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
     $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
     $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
     $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
     $dbName = 'php';
     // …
}

$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

?>

