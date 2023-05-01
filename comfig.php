<?php

$mysqli = new mysqli("localhost", "root", "", "hms");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}