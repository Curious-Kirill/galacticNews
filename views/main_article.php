<?php
include("./includes/db.php");
$query = $conn->query("SELECT * FROM `news` ORDER BY  `date` DESC" );
$article = $query->fetch_assoc();
$conn->close();
?>