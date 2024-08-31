<?php

include('../etc/pdoconn.php');

if(isset($_POST['action'])) {
    if($_POST['action'] == 'edit') {
        $data = array(
            ':firstName' => $_POST['firstName'],
            ':lastName' => $_POST['lastName'],
            ':username' => $_POST['username'],
            ':email' => $_POST['email'],
            ':tntType' => $_POST['tntType'],
            ':gender' => $_POST['gender'],
            ':nextofKin' => $_POST['nextofKin'],
            ':nextofKinC' => $_POST['nextofKinC'],
            ':nationality' => $_POST['nationality'],
            ':idNo' => $_POST['idNo'],
            ':ApartmtName' => $_POST['ApartmtName'],
            ':hseNo' => $_POST['hseNo'],
            ':id'    => $_POST['id'],
        );

        $query = "
        UPDATE hseTenantData 
        SET firstName = :firstName,
            lastName = :lastName,
            username = :username,
            email = :email,
            tntType = :tntType,
            gender = :gender,
            nextofKin = :nextofKin,
            nextofKinC = :nextofKinC,
            nationality = :nationality,
            idNo = :idNo,
            ApartmtName = :ApartmtName,
            hseNo = :hseNo
        WHERE id = :id
        ";
        $statement = $conn->prepare($query);
        if($statement->execute($data)) {
            echo json_encode($_POST);
            $query2 = "
            UPDATE hseUnits
            SET first_name = :firstName,
                last_name = :lastName,
                ApartmtName = :ApartmtName
            WHERE hseNo = :hseNo     
            ";
            $stmt = $conn->prepare($query2);
            $stmt->execute([
                ':firstName' => $_POST['firstName'],
                ':lastName' => $_POST['lastName'],
                ':ApartmtName' => $_POST['ApartmtName'],
                ':hseNo' => $_POST['hseNo']
            ]);
        } else {
            // Handle error
            echo json_encode(array('error' => 'Error updating data.'));
        }
    } elseif($_POST['action'] == 'delete') {
    
        $query = "
        DELETE FROM hseTenantData 
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
