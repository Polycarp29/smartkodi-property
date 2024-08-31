<?php

include('../etc/pdoconn.php');

if(isset($_POST['action'])) {
    if($_POST['action'] == 'edit') {
        $data = array(
            ':hseNo'  => $_POST['hseNo'],
            ':ApartmtName'  => $_POST['ApartmtName'],
            ':Floor'   => $_POST['Floor'],
            ':Rent' => $_POST['Rent'],
            ':Deposit' => $_POST['Deposit'],
            ':UnitSize' => $_POST['UnitSize'],
            ':HCondition' => $_POST['HCondition'],
            ':HStatus' => $_POST['HStatus'],
            ':h2oMeterNo' => $_POST['h2oMeterNo'],
            ':balances' => $_POST['balances'],
            ':id'    => $_POST['id'],
        );

        $query = "
        UPDATE hseUnits 
        SET hseNo = :hseNo,
            ApartmtName = :ApartmtName,
            Floor = :Floor,
            Rent = :Rent,
            Deposit = :Deposit,
            UnitSize = :UnitSize,
            HCondition = :HCondition,
            HStatus = :HStatus,
            h2oMeterNo = :h2oMeterNo,
            balances = :balances
        WHERE id = :id
        ";
        $statement = $conn->prepare($query);
        if($statement->execute($data)) {
            echo json_encode($_POST);
        } else {
            // Handle error
            echo json_encode(array('error' => 'Error updating data.'));
        }
    } elseif($_POST['action'] == 'delete') {
        $query = "
        DELETE FROM hseUnits 
        WHERE id = :id
        ";
        $statement = $conn->prepare($query);
        $statement->bindParam(':id', $_POST["id"]);
        if($statement->execute()) {
            echo json_encode($_POST);
        } else {
            // Handle error
            echo json_encode(array('error' => 'Error deleting data.'));
        }
    }
} else {
    echo json_encode(array('error' => 'No action specified.'));
}

?>