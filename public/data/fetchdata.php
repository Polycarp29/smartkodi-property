<?php 
$valueName = $_SESSION['username'];

$sql = "SELECT * FROM property_details WHERE u_landlord=? LIMIT 15";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $valueName);
$stmt->execute();
$result = $stmt->get_result();

$datafetch = $result->fetch_all(MYSQLI_ASSOC);

