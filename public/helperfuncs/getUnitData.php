<?php
header('Content-Type: application/json');
include('../etc/pdoconn.php');

$data = [
    'sessionVar' => $_POST['username'],
    'apartmentId' => $_POST['apartment_id'],
    'unitAvail' => 'Vacant'
];

try 
{
    $stmt = $conn->prepare("SELECT hseNo FROM hseUnits WHERE u_landlord = :sessionVar AND ApartmtName =:apartmentId AND HStatus = :unitAvail");
    $stmt->execute([
        ':sessionVar' => $data['sessionVar'],
        ':apartmentId' => $data['apartmentId'],
        ':unitAvail' => $data['unitAvail']
    ]);
    $stmt->setFetchMode(PDO :: FETCH_ASSOC);
    $UnitData = $stmt->fetchAll();

    echo json_encode($UnitData);
}catch(PDOException $e)
{
    echo json_encode(['error' => $e->getMessage()]);
}