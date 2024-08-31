<?php

include('../etc/db_conn.php');

$stmt = $conn->prepare("SELECT * FROM hseTenantData WHERE u_landlord=? AND ApartmtName=? AND hseNo=?");
$stmt->bind_param('sss', $sessionVar, $sessionVarAptmt, $sessionVarHseNo);
$stmt->execute();
$rslt = $stmt->get_result();
$resultdata = $rslt->fetch_all(MYSQLI_ASSOC);