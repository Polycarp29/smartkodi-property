<?php
$check_conn = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define("DB_PTH", $check_conn .'etc' . DIRECTORY_SEPARATOR);

require DB_PTH . 'db_conn.php';

$sql = "SELECT prptyName FROM property_details WHERE u_landlord=?";
$stmt= $conn->prepare($sql);
$stmt->bind_param("s", $valueName);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);










