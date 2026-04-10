<?php
function getPDO() {
    $host = 'localhost';
    $dbname = 'etudiant_hermes_tanger';
    $username = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'
    ];
    return new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
}

?>