<?php

include('frmValidate.php');
include('../etc/pdoconn.php');

function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}



$errors = array();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $validate = new ValidateData($_POST);
    $validate->validate();

    $dataInputs = [
        'u_landlord' => sanitize_input($_POST['custF']),
        'firstName' => sanitize_input($_POST['firstName']),
        'lastName' => sanitize_input($_POST['lastName']),
        'Username' => sanitize_input($_POST['Username']),
        'email' => sanitize_input($_POST['email']),
        'password' => sanitize_input($_POST['Pass']),
        'tntType' => sanitize_input($_POST['tenType']),
        'gender' => sanitize_input($_POST['gender']),
        'nextofKin' => sanitize_input($_POST['nextKin']),
        'nextofkinContact' => sanitize_input($_POST['nextKinContact']),
        'nationality' => sanitize_input($_POST['nationality']),
        'idNo' => sanitize_input($_POST['idNo']),
        'mobileNo' => sanitize_input($_POST['telNo']),
        'ApartmtName' => sanitize_input($_POST['ApartmtName']),
        'hseNo' => sanitize_input($_POST['UnitNo'])
    ];

    // Check for Duplicates 
    try {
        $statement = $conn->prepare("SELECT hseNo FROM hseTenantData WHERE u_landlord = :u_landlord AND ApartmtName = :ApartmtName");
        $statement->execute([
            ':u_landlord' => $dataInputs['u_landlord'],
            ':ApartmtName' => $dataInputs['ApartmtName']
        ]);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $dataFetch = $statement->fetchAll();

        foreach ($dataFetch as $key) {
            if ($key['hseNo'] == $dataInputs['hseNo']) {
                $errors[] = "House Already Occupied";
            }
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $errors[] = "An error occurred while checking for duplicates.";
    }

    try
    {
        $check = $conn->prepare("SELECT hseNo, username, email FROM hseTenantData WHERE u_landlord = :u_landlord AND ApartmtName = :ApartmtName");
        $check->execute([
            ':u_landlord' => $dataInputs['u_landlord'],
            ':ApartmtName' => $dataInputs['ApartmtName']
        ]);
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $dataCheck = $statement->fetchAll();

        foreach ($dataCheck as $key) {
            if ($key['hseNo'] == $dataInputs['hseNo']) {
                $errors[] = "House Already Occupied";
            }elseif($key['hseNo'] == $dataInputs['Username'] && $key['email'] == $dataInputs['email'])
            {
                $errors[] = "Username or Email is on Record: User Tenant Should Login to Select House Unit";
            }
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $errors[] = "An error occurred while checking for duplicates.";
    }
    

    if (count($errors) == 0) {
        try {
            $hstatus = "Occupied";
            $avatar = "Null";
            $dateTime = date('Y-m-d H-m-s');
            $hashedPassword = password_hash($dataInputs['password'], PASSWORD_BCRYPT);

            $conn->beginTransaction();

            $stmt = $conn->prepare("INSERT INTO hseTenantData(u_landlord, firstName, lastName, Avatar, username, email, password, tntType, gender, nextofKin, nextofKinC, nationality, idNo, mobileNo, ApartmtName, hseNo, dateTime) VALUES(:u_landlord, :firstName, :lastName, :Avatar, :Username, :email, :password, :tntType, :gender, :nextofKin, :nextofkinContact, :nationality, :idNo, :mobileNo, :ApartmtName, :hseNo, :dateTime)");

            $stmt->execute([
                ':u_landlord' => $dataInputs['u_landlord'],
                ':firstName' => $dataInputs['firstName'],
                ':lastName' => $dataInputs['lastName'],
                ':Avatar' => $avatar,
                ':Username' => $dataInputs['Username'],
                ':email' => $dataInputs['email'],
                ':password' => $hashedPassword,
                ':tntType' => $dataInputs['tntType'],
                ':gender' => $dataInputs['gender'],
                ':nextofKin' => $dataInputs['nextofKin'],
                ':nextofkinContact' => $dataInputs['nextofkinContact'],
                ':nationality' => $dataInputs['nationality'],
                ':idNo' => $dataInputs['idNo'],
                ':mobileNo' => $dataInputs['mobileNo'],
                ':ApartmtName' => $dataInputs['ApartmtName'],
                ':hseNo' => $dataInputs['hseNo'],
                ':dateTime' => $dateTime
            ]);

            $stmt = $conn->prepare("UPDATE hseUnits SET first_name = :firstName, last_name = :lastName, HStatus = :hstatus WHERE u_landlord = :u_landlord AND ApartmtName = :ApartmtName AND hseNo = :hseNo");
            $stmt->execute([
                ':firstName' => $dataInputs['firstName'],
                ':lastName' => $dataInputs['lastName'],
                ':hstatus' => $hstatus,
                ':u_landlord' => $dataInputs['u_landlord'],
                ':ApartmtName' => $dataInputs['ApartmtName'],
                ':hseNo' => $dataInputs['hseNo']
            ]);

            $conn->commit();
            echo '<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg"> Records Saved Successfully</div>';
        } catch (PDOException $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
}

// Display errors or success message as needed
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div class='bg-red-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg'> $error </div>";
    }
}
?>
