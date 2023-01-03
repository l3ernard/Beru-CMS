<?php
$dbtype = 'mysql';
$dbname = 'berucms';
$dbhost = 'localhost';
$dbport = '3306';

$charset = 'utf8mb4';
$dbuser = 'root';
$dbpass = '';


$options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
];

$dsn = "$dbtype:host=$dbhost;dbname=$dbname;port=$dbport;charset=$charset";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), $e->getCode());
}

?>