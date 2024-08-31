<?php

include('../etc/db_conn.php');

$sql = "SELECT * FROM property_details WHERE prptyName=? AND u_landlord=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $valuePrpty, $valueName,);
$stmt->execute();

$results = $stmt->get_result();
$dataSelect = $results->fetch_all(MYSQLI_ASSOC);


