<?php

$host       = "localhost";
$username   = "root";
$password   = "root";
$dbname     = "Formula_1_Driver_Statistics_2019";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );