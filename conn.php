<?php
	$conn = new mysqli('localhost', 'root', '', 'angular');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>