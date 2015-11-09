<?php
$conn = new mysqli("localhost", "root", "", "school");
$conn->set_charset("utf8");

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}
?>