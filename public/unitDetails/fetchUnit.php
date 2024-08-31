<?php

/**Fetch Data */
$sql = "SELECT * FROM hseTenantData WHERE u_landlord=? LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $valueName);
$stmt->execute();
$hseResults =  $stmt->get_result();

$hseData = $hseResults->fetch_all(MYSQLI_ASSOC);