<?php 
header('Content-Type: application/json');
include('../etc/pdoconn.php');

$data = [
        'sessionVar' => $_POST['username']
];

try 
{
    $stmt = $conn->prepare("SELECT prptyName, id FROM  property_details WHERE u_landlord= :sessionVar");
    $stmt->execute([':sessionVar' => $data['sessionVar']]);
    $stmt->setFetchMode(PDO :: FETCH_ASSOC);
    $apartData = $stmt->fetchAll();

    // Echo in  JSON Format

    echo json_encode($apartData);


}
catch(PDOException $e)
{
    echo json_encode(['error' => $e->getMessage()]);
}