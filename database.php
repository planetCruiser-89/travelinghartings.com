<?php

$mysqli = new mysqli("localhost", "root", "IlovePordenone", "travelingHartingsArticles");

//check connection
if($mysqli === false) {
    die("ERROR: Could not connect." . $mysqli->connect_error);
}

?>
